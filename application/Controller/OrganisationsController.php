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

use Mini\Model\Organisations;

class OrganisationsController extends AdminbaseController
{
    /**
     */
    
    public $title = 'Организации';
     
    public function index()
    {
        // Instance new Model ()
        $O = new Organisations();
        // getting all  and amount of 
        $Os = $O->getAll();
        // load views
        //$this->title = 'Организации';
        require APP . 'view/_templates/header.php';
        require APP . 'view/organisations/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     */
    public function add()
    {
        //\Mini\Libs\Helper::vdw($_POST);
        // if we have POST data to create a new entry
        if (isset($_POST["submit_add_organisations"])) {
          if (isset($_POST["id"]) AND ((int)$_POST["id"]>0)) {
            
            if ((int)$_POST["id"]>0) {
              
              //$this->update();
            }
          } else {
            // Instance new Model ()
            $O = new Organisations();
            
            $oid = $O->add($_POST["name"], $_POST["sort"],  $_POST["alias"], $_POST['email'], $_POST['worktime'], $_POST['adress'], $_POST['position']);
            
            header('location: ' . URL . 'organisations/');
          }
        } else {
        
          $this->title = 'Добавление организации';
          require APP . 'view/_templates/header.php';
          require APP . 'view/organisations/add.php';
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
            $M = new Organisations();
            // do () in model/model.php
            $M->delete($id);
        }

        // where to go after  has been deleted
        header('location: ' . URL . 'organisations/');
    }
    
    public function edit($id)
    {
        // if we have an id of a  that should be edited
        if (isset($id)) {
            // Instance new Model ()
            $O = new Organisations();
            // do getSong() in model/model.php
            $Oo = $O->get($id);

            // If the song wasn't found, then it would have returned false, and we need to display the error page
            if ($Oo === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // load views. within the views we can echo out $song easily
                require APP . 'view/_templates/header.php';
                require APP . 'view/organisations/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            // redirect user to songs index page (as we don't have a )
            header('location: ' . URL . 'organisations/');
        }
    }
    
    public function update()
    {
        if (isset($_POST["submit_edit_organisations"])) {
          // if we have POST data to create a new  entry
          if (isset($_POST["id"])) {
            if ((int)$_POST["id"]>0) {
              // Instance new Model ()
              $O = new Organisations();
              // do update() from model/model.php
              $O->update($_POST["name"], $_POST["sort"],  $_POST["alias"], $_POST['email'], $_POST['worktime'], $_POST['adress'], $_POST['position'], $_POST['id']);
            }
          }
        }

        // where to go after song has been added
        header('location: ' . URL . 'organisations/');
    }

}
