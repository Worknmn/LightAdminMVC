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

use Mini\Model\Offers;
use Mini\Model\OfferCategory;

class OffersController extends AdminbaseController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/OfferCategory/index (which is the default page btw)
     */
    
    public $title = '';
     
    public function index()
    {
        // Instance new Model ()
        $O = new Offers();
        // getting all  and amount of 
        $Os = $O->getAll();
        // load views
        $this->title = 'Офферы';
        require APP . 'view/_templates/header.php';
        require APP . 'view/offers/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * This method handles what happens when you move to http://yourproject/OfferCategory/addCategory
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function add()
    {
        //\Mini\Libs\Helper::vdw($_POST);
        // if we have POST data to create a new entry
        if (isset($_POST["submit_add_offer"])) {
          if (isset($_POST["id"]) AND ((int)$_POST["id"]>0)) {
            
            if ((int)$_POST["id"]>0) {
              
              $this->update();
            }
          } else {
            // Instance new Model (addCategory)
            $O = new Offers();
            // do addCategory() in model/model.php
            $values = $O->preparevalues();
            //\Mini\Libs\Helper::vdw($values);
            //die();
            
            $oid = $O->add($_POST["name"], $_POST["sort"],  $_POST["alias"], $_POST['refurl'], $_POST['imagefile'], $_POST['text'], $_POST['offercategoryid']);
            
            $a['idoffer'] = $oid;
            
            //die($oid);
            $a['values'] = $values;
            
            $O->addofferproperties($a);
            header('location: ' . URL . 'offers/');
          }
        } else {
        
            // Instance new Model ()
            $OC = new OfferCategory();
            // getting all  and amount of 
            $OCs = $OC->getAll();
        
          $this->title = 'Добавление оффера';
          require APP . 'view/_templates/header.php';
          require APP . 'view/offers/add.php';
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
            $OC = new Offers();
            // do () in model/model.php
            $OC->delete($id);
        }

        // where to go after  has been deleted
        header('location: ' . URL . 'offers/');
    }
    
    public function edit($id)
    {
        // if we have an id of a  that should be edited
        if (isset($id)) {
            // Instance new Model ()
            $Ot = new Offers();
            // 
            $Oto = $Ot->get($id);

            // If the song wasn't found, then it would have returned false, and we need to display the error page
            if ($Oto === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // load views. within the views we can echo out $song easily
                //$this->propertyconfig = $OPt->initpropertyconfig($OPto->type);
                //\Mini\Libs\Helper::vdw($Oto); 
                $OV = $Ot->getpropertiesforofferunion($id);
                
                // Instance new Model ()
                $OC = new OfferCategory();
                // getting all  and amount of 
                $OCs = $OC->getAll();
                
                require APP . 'view/_templates/header.php';
                require APP . 'view/offers/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            // redirect user to songs index page (as we don't have a )
            //header('location: ' . URL . 'offerpropertytypes/');
        }
    }
    
    public function update()
    {
        // if we have POST data to create a new  entry
        //submit_edit_offer
        if (isset($_POST["submit_edit_offer"])) {
          if (isset($_POST["id"])) {
            if ((int)$_POST["id"]>0) {
              // Instance new Model ()
              $Ot = new Offers();
              // do update() from model/model.php
              $Ot->update($_POST["name"], $_POST["sort"], $_POST["alias"], $_POST["refurl"], $_POST['imagefile'], $_POST['text'], $_POST["offercategoryid"], $_POST['id']);
            }
          }
  
          // where to go after song has been added
          header('location: ' . URL . 'offers/');
        }
    }
    
    public function getpropertiesforcategory()
    {
        // if we have POST data to create a new  entry
        if (isset($_POST["offercategoryid"])) {
          if ((int)$_POST["offercategoryid"]>0) {
            // Instance new Model ()
            $O = new Offers();
            $properties = $O->getpropertiesforcategory($_POST["offercategoryid"]);
            require APP . 'view/offers/properties.php';
          }
        }
    }    
    
    

}
