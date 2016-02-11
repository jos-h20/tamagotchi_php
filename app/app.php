<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Gotchi.php";

    session_start();

    if(empty($_SESSION['gotchi_attributes'])) {
        $_SESSION['gotchi_attributes'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('gotchi.html.twig', array('attributes' => Gotchi::getAll()));
    });

    $app->post("/name", function() use ($app) {
        $gotchi = new Gotchi($_POST['name']);
        $gotchi->save();
        return $app['twig']->render('add_gotchi.html.twig', array('newgotchi' => $gotchi));
    });

    $app->get("/feed", function() use ($app) {
        $current_gotchi = Gotchi::getAll();
        $current_gotchi[0]->setFood(0);
        $food = $current_gotchi[0]->getFood();
        $current_gotchi[0]->setFood($food + 1);

        return $app['twig']->render('feed.html.twig');
    });

    $app->post("/delete_gotchis", function() use($app) {
        Gotchi::deleteAll();
        return $app['twig']->render('delete_gotchis.html.twig');
    });

    return $app;
 ?>
