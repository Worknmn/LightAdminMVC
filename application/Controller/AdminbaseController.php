<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

class AdminbaseController
{

    public $title = "";
    
    public function __construct() {
        /**/
        session_start();    //die();
        
        //защита всей админки
        if (!isset($_SESSION['admin'])) {
            header('location: ' . URL . '');
            exit();
        }
          
        /**/
    }
    
    // заглушка индекса
    public function index() {
      header('location: ' . URL . '');
    }
}
