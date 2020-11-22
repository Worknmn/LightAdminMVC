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

use Mini\Model\Landing;
use Mini\Model\LandingCategory;

class LandingController extends AdminbaseController
{
    /**
     */
    
    public $title = 'Лэндинги';
     
    public function index()
    {
        // Instance new Model ()
        $L = new Landing();
        // getting all  and amount of 
        $Ls = $L->getAll();
        // load views
        //$this->title = 'Лэндинги';
        require APP . 'view/_templates/header.php';
        require APP . 'view/landing/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     */
    public function add()
    {
        //\Mini\Libs\Helper::vdw($_POST);
        // if we have POST data to create a new entry
        if (isset($_POST["submit_add_landing"])) {
          if (isset($_POST["id"]) AND ((int)$_POST["id"]>0)) {
            
            if ((int)$_POST["id"]>0) {
              
              $this->update();
            }
          } else {
            // Instance new Model (addCategory)
            $L = new Landing();

            //\Mini\Libs\Helper::vdw($values);
            //die();
            
            //, $categoryid, $title, $description, $keywords, $h1, $uptext, $text, $downtext
            $oid = $L->add($_POST["name"], $_POST["sort"],  $_POST["alias"], $_POST['categoryid'], $_POST['title'],
                    $_POST['description'], $_POST['keywords'], $_POST['h1'], $_POST['uptext'], $_POST['text'], $_POST['downtext']);
            
            header('location: ' . URL . 'landing/');
          }
        } else {
        
            // Instance new Model ()
            $LC = new LandingCategory();
            // getting all  and amount of 
            $LCs = $LC->getAll();
        
          $this->title = 'Добавление лэндинга';
          require APP . 'view/_templates/header.php';
          require APP . 'view/landing/add.php';
          require APP . 'view/_templates/footer.php';
        }

        // where to go after has been added
        //header('location: ' . URL . 'offers/');
   }     
        
    
    public function delete($id)
    {
        // if we have an id of a  that should be deleted
        if (isset($id)) {
            // Instance new Model ()
            $L = new Landing();
            // do () in model/model.php
            $L->delete($id);
        }

        // where to go after  has been deleted
        header('location: ' . URL . 'landing/');
    }
    
    public function update1()
    {
        if (isset($_POST["submit_edit_landing"])) {
        // if we have POST data to create a new  entry
        if (isset($_POST["id"])) {
          if ((int)$_POST["id"]>0) {
            // Instance new Model ()
            $L = new Landing();
            // do update() from model/model.php
            $L->update($_POST["name"], $_POST["sort"],  $_POST["alias"], $_POST['id']);
          }
        }
        }

        // where to go after song has been added
        header('location: ' . URL . 'landing/');
    }

}
