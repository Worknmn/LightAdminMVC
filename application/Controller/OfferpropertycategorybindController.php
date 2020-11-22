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

use Mini\Model\OfferPropertyCategoryBind;
use Mini\Model\OfferPropertyTypes;
use Mini\Model\OfferCategory;

class OfferpropertycategorybindController extends AdminbaseController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/OfferCategory/index (which is the default page btw)
     */
    
    public $title = '';
     
    
    public function index()
    {
        // Instance new Model ()
        $OPCB = new OfferPropertyCategoryBind();
        // getting all  and amount of 
        $OPCBs = $OPCB->getAll();
        
        // Instance new Model ()
        $OPt = new OfferPropertyTypes();
        // getting all  and amount of 
        $OPts = $OPt->getAll();
        
        // Instance new Model ()
        $OC = new OfferCategory();
        // getting all  and amount of 
        $OCs = $OC->getAll();
        
        // load views
        $this->title = 'Настройка привязки свойств офферов к категориям';
        require APP . 'view/_templates/header.php';
        require APP . 'view/offerpropertycategorybind/index.php';
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
        if (isset($_POST["submit_add_offerpropertycategorybind"])) {
          if (isset($_POST["id"]) AND ((int)$_POST["id"]>0)) {
            //update
                          
            //$this->update();
            //header('location: ' . URL . 'offerpropertycategorybind/');
          } else {
            //add
            
            // Instance new Model ()
            $OPCBt = new OfferPropertyCategoryBind();
            // do () in model/model.php  
            //$propertyconfig = $OPt->preparepropertyconfig();
            //$propertyconfig = serialize($propertyconfig);
                        
            //$name, $sort, $alias, $idoffercategory, $idofferpropertytype
            foreach ($_POST["offerpropertytypesids"] as $idofferpropertytype) {
              $OPCBt->add($_POST["name"], $_POST["sort"], $_POST["alias"], $_POST["offercategoryid"], $idofferpropertytype);
            }
          }
          // where to go after has been added
          header('location: ' . URL . 'offerpropertycategorybind/');
        } else {
        
            // Instance new Model ()
            $OPt = new OfferPropertyTypes();
            // getting all  and amount of 
            $OPts = $OPt->getAll();
            
            // Instance new Model ()
            $OC = new OfferCategory();
            // getting all  and amount of 
            $OCs = $OC->getAll();
            
          $this->title = 'Добавление типа свойства';
          require APP . 'view/_templates/header.php';
          require APP . 'view/offerpropertycategorybind/add.php';
          require APP . 'view/_templates/footer.php';
        }

    }
    
    public function delete($id)
    {
        // if we have an id of a  that should be deleted
        if (isset($id)) {
            // Instance new Model ()
            $OPCBt = new OfferPropertyCategoryBind();
            // do () in model/model.php
            $OPCBt->delete($id);
        }

        // where to go after  has been deleted
        header('location: ' . URL . 'offerpropertycategorybind/');
    }
    
     /**
     * ACTION: 
     * This method handles what happens when you move to 
     * @param int  Id of the to-edit 
     */
    public function edit($id)
    {
        // if we have an id of a  that should be edited
        if (isset($id)) {
            // Instance new Model ()
            $OPCBt = new OfferPropertyCategoryBind();
            // 
            $OPCBto = $OPCBt->get($id);

            // If the song wasn't found, then it would have returned false, and we need to display the error page
            if ($OPCBto === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // load views. within the views we can echo out $song easily
                //$this->propertyconfig = $OPt->initpropertyconfig($OPto->type);
                
                // Instance new Model ()
                $OPt = new OfferPropertyTypes();
                // getting all  and amount of 
                $OPts = $OPt->getAll();
                
                // Instance new Model ()
                $OC = new OfferCategory();
                // getting all  and amount of 
                $OCs = $OC->getAll();
                
                require APP . 'view/_templates/header.php';
                require APP . 'view/offerpropertycategorybind/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            // redirect user to songs index page (as we don't have a )
            //header('location: ' . URL . 'offerpropertytypes/');
        }
    }
    
    public function update()
    {
        if (isset($_POST["submit_update_offerpropertycategorybind"])) {
        if (isset($_POST["id"])) {
          if ((int)$_POST["id"]>0) {
            // Instance new Model ()
            $OPCBt = new OfferPropertyCategoryBind();
            // do update() from model/model.php
            //\Mini\Libs\Helper::vdw($propertyconfig);
            //update($name, $sort, $alias, $type, $propertyconfig, $id)
            $OPCBt->update($_POST["name"], $_POST["sort"], $_POST["alias"], $_POST["offercategoryid"], $_POST["offerpropertytypesids"], $_POST['id']);
            // where to go after song has been added
            header('location: ' . URL . 'offerpropertycategorybind/');
          }
        }
        }
        
    }

}
