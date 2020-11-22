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

use Mini\Model\LandingCategory;

class LandingcategoryController extends AdminbaseController
{
    /**
     */
    
    public $title = '';
     
    public function index()
    {
        // Instance new Model ()
        $LC = new LandingCategory();
        // getting all  and amount of 
        $LCs = $LC->getAll();
        // load views
        $this->title = 'Категории лэндингов';
        require APP . 'view/_templates/header.php';
        require APP . 'view/landingcategory/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     */
    public function addCategory()
    {
        //\Mini\Libs\Helper::vdw($_POST);
        // if we have POST data to create a new entry
        if (isset($_POST["submit_add_landingcategory"])) {
          if (isset($_POST["id"]) AND ((int)$_POST["id"]>0)) {
            
            if ((int)$_POST["id"]>0) {
              
              $this->updateCategory();
            }
          } else {
            // Instance new Model (addCategory)
            $LC = new LandingCategory();
            // do addCategory() in model/model.php
            $LC->addCategory($_POST["name"], $_POST["sort"],  $_POST["alias"]);
          }
        }

        // where to go after has been added
        header('location: ' . URL . 'landingcategory/');
    }
    
    public function deleteCategory($id)
    {
        // if we have an id of a  that should be deleted
        if (isset($id)) {
            // Instance new Model ()
            $LC = new LandingCategory();
            // do () in model/model.php
            $LC->deleteCategory($id);
        }

        // where to go after  has been deleted
        header('location: ' . URL . 'landingcategory/');
    }
    
    public function updateCategory()
    {
        // if we have POST data to create a new  entry
        if (isset($_POST["id"])) {
          if ((int)$_POST["id"]>0) {
            // Instance new Model ()
            $LC = new LandingCategory();
            // do update() from model/model.php
            $LC->updateCategory($_POST["name"], $_POST["sort"],  $_POST["alias"], $_POST['id']);
          }
        }

        // where to go after song has been added
        header('location: ' . URL . 'landingcategory/');
    }

}
