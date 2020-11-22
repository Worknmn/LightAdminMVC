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

use Mini\Model\OfferProperties;

class OfferpropertiesController extends AdminbaseController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/OfferCategory/index (which is the default page btw)
     */
    
    public $title = '';
     
    public function index()
    {
        // Instance new Model ()
        //$OP = new OfferProperties();
        // getting all  and amount of 
        //$OPs = $OP->getAll();
        // load views
        $this->title = 'Настройка свойств офферов';
        require APP . 'view/_templates/header.php';
        //require APP . 'view/offerproperties/index.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function alltypes()
    {
        // Instance new Model ()
        $OPt = new OfferProperties();
        // getting all  and amount of 
        $OPts = $OPt->getPropTypesAll();
        // load views
        $this->title = 'Настройка свойств офферов';
        require APP . 'view/_templates/header.php';
        require APP . 'view/offerproperties/types.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * This method handles what happens when you move to http://yourproject/OfferCategory/addCategory
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function addCategory1()
    {
        //\Mini\Libs\Helper::vdw($_POST);
        // if we have POST data to create a new entry
        if (isset($_POST["submit_add_offercategory"])) {
          if (isset($_POST["id"]) AND ((int)$_POST["id"]>0)) {
            
            if ((int)$_POST["id"]>0) {
              
              $this->updateCategory();
            }
          } else {
            // Instance new Model (addCategory)
            $OC = new OfferCategory();
            // do addCategory() in model/model.php
            $OC->addCategory($_POST["name"], $_POST["sort"],  $_POST["url"]);
          }
        }

        // where to go after has been added
        header('location: ' . URL . 'offercategory/');
    }
    
    public function deleteOPTypes1($id)
    {
        // if we have an id of a  that should be deleted
        if (isset($id)) {
            // Instance new Model ()
            $OP = new OfferCategory();
            // do () in model/model.php
            $OP->delete($id);
        }

        // where to go after  has been deleted
        header('location: ' . URL . 'offerproperties/types');
    }
    
    public function updateCategory1()
    {
        // if we have POST data to create a new  entry
        if (isset($_POST["id"])) {
          if ((int)$_POST["id"]>0) {
            // Instance new Model ()
            $OC = new OfferCategory();
            // do update() from model/model.php
            $OC->updateCategory($_POST["name"], $_POST["sort"],  $_POST["url"], $_POST['id']);
          }
        }

        // where to go after song has been added
        header('location: ' . URL . 'offercategory/');
    }

}
