<?php
class Gotchi
{
    /****Properties****/
    private $name;
    /****Constructor****/
    function __construct($name)
    {
        $this->name = $name;
    }
    /****Setters****/
    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }
    /****Getters****/
    function getName()
    {
        return $this->name;
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
