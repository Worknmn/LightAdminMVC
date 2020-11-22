<?php

/**
 * Class 
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\Auth;

class AuthController
{
     
    public $error = '';
    
    public function __construct() {
        /**/
        session_start();
    }
     
    public function index()
    {
        // load views
        $this->gotomainadmin();
        
        require APP . 'view/_templates/headerlogin.php';
        require APP . 'view/login/login.php';
        require APP . 'view/_templates/footerlogin.php';
    }

    public function login()
    {
        
        //\Mini\Libs\Helper::vdw($_SESSION);
        //die();
        
        $this->gotomainadmin();
        
        $auth = new Auth();
        $error = '';
        if (!empty($_POST)) {
            if (!$auth->loginValidate($_POST)) {
                $this->error = 'Ошибка входа.';
                $this->index();
            } else {
              $_SESSION['admin'] = true;
              //$this->view->location('home/add');
              //die('успешно вход');
              header('location: ' . URL . 'dashboard/');
            }
        } else {
            $this->index();
        }
        
        
        //require APP . 'view/_templates/header.php';
        //require APP . 'view/home/example_one.php';
        //require APP . 'view/_templates/footer.php';
    }

    public function logout()
    {
      unset($_SESSION['admin']);
      header('location: ' . URL . '');
    }
    
    private function gotomainadmin() {
        if (isset($_SESSION['admin'])) {
            header('location: ' . URL . 'dashboard/');
            //die('111');
        }
    }
}
