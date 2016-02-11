<?php
class Gotchi
{
    /****Properties****/
    private $name;
    private $food;
    private $sleep;
    /****Constructor****/
    function __construct($name)
    {
        $this->name = $name;
        $this->food = $food = 5;
        $this->sleep = $sleep = 5;
    }
    /****Setters****/
    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }
    function setFood($new_food)
    {
        $this->food = (integer) $new_food;
    }
    function setSleep($new_sleep)
    {
        $this->sleep = (integer) $new_sleep;
    }
    /****Getters****/
    function getName()
    {
        return $this->name;
    }
    function getFood()
    {
        return $this->food;
    }
    function getSleep()
    {
        return $this->sleep;
    }
    /****Functions****/
    //save all
    function save()
    {
        array_push($_SESSION['gotchi_attributes'], $this);
    }
    //get all gotchi attributes
    static function getAll()
    {
        return $_SESSION['gotchi_attributes'];
    }
    //delete all
    static function deleteAll()
    {
        $_SESSION['gotchi_attributes'] = array();
    }
} ?>
