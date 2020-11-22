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

use Mini\Model\OfferPropertyTypes;
use Mini\Model\Offers;
use Mini\Model\OfferCategory;
use Mini\Model\OfferPropertyCategoryBind;

class OfferpropertytypesController extends AdminbaseController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/OfferCategory/index (which is the default page btw)
     */
    
    public $title = '';
     
    
    public function index()
    {
        // Instance new Model ()
        $OPt = new OfferPropertyTypes();
        // getting all  and amount of 
        $OPts = $OPt->getAll();
        // load views
        $this->title = 'Настройка свойств офферов';
        require APP . 'view/_templates/header.php';
        require APP . 'view/offerpropertytypes/index.php';
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
        if (isset($_POST["submit_add_offerpropertytypes"])) {
          if (isset($_POST["id"]) AND ((int)$_POST["id"]>0)) {
            
            if ((int)$_POST["id"]>0) {
              
              //$this->updateCategory();
              //header('location: ' . URL . 'offerproperties/');
            }
          } else {
            // Instance new Model (addCategory)
            $OPt = new OfferPropertyTypes();
            // do addCategory() in model/model.php  $name, $sort, $alias, $type, $propertyvalue
            $propertyconfig = $OPt->preparepropertyconfig();
            $propertyconfig = serialize($propertyconfig);
            $idofferpropertytype = $OPt->add($_POST["name"], $_POST["sort"], $_POST["alias"], $_POST["type"], $propertyconfig);
            if ($idofferpropertytype>0) {
                // Instance new Model ()
                $OPCBt = new OfferPropertyCategoryBind();
                foreach ($_POST["offercategoryid"] as $offercategoryid) {
                  $OPCBt->add($_POST["name"], $_POST["sort"], $_POST["alias"], $offercategoryid, $idofferpropertytype);
                }
            } 
          }
          // where to go after has been added
          header('location: ' . URL . 'offerpropertytypes/');
        } else {
        
        
          // Instance new Model ()
          $OC = new OfferCategory();
          // getting all  and amount of 
          $OCs = $OC->getAll();
        
          $this->title = 'Добавление типа свойства';
          require APP . 'view/_templates/header.php';
          require APP . 'view/offerpropertytypes/add.php';
          require APP . 'view/_templates/footer.php';
        }

    }
    
    public function delete($id)
    {
        // if we have an id of a  that should be deleted
        if (isset($id)) {
            // Instance new Model ()
            $Ot = new Offers();
            $Ot->deleteoffervaluesByPropertyTypeID($id);
             
            $OPCBt = new OfferPropertyCategoryBind();
            $OPCBt->deleteByPropertyTypeID($id);
                        
            $OPt = new OfferPropertyTypes();
            // do () in model/model.php
            $OPt->delete($id);
        }

        // where to go after  has been deleted
        header('location: ' . URL . 'offerpropertytypes/');
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
            $OPt = new OfferPropertyTypes();
            // do getSong() in model/model.php
            $OPto = $OPt->get($id);

            // If the song wasn't found, then it would have returned false, and we need to display the error page
            if ($OPto === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // Instance new Model ()
                $OC = new OfferCategory();
                // getting all  and amount of 
                $OCs = $OC->getAll();
                
                // Instance new Model ()
                $OPCBt = new OfferPropertyCategoryBind();
                // getting all  and amount of 
                $OPCBtos = $OPCBt->getByPropertyTypeID($id);
                //\Mini\Libs\Helper::vdw($OPCBtos);
                if ($OPCBtos) {
                  foreach ($OCs as $c=>$valuec) {
                    $OCs[$c]->select = FALSE;
                    foreach ($OPCBtos as $ec=>$evalue) {
                      //\Mini\Libs\Helper::vdw($evalue);
                      if ($evalue->idoffercategory==$valuec->id) {
                        $OCs[$c]->select = TRUE;
                      }
                    }
                  }
                }
                //\Mini\Libs\Helper::vdw($OCs);
                // load views. within the views we can echo out $song easily
                $this->propertyconfig = $OPt->initpropertyconfig($OPto->type);
                require APP . 'view/_templates/header.php';
                require APP . 'view/offerpropertytypes/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            // redirect user to songs index page (as we don't have a )
            // header('location: ' . URL . 'offerpropertytypes/');
        }
    }
    
    public function update()
    {
        if (isset($_POST["submit_update_offerpropertytypes"])) {
        if (isset($_POST["id"])) {
          if ((int)$_POST["id"]>0) {
            // Instance new Model ()
            $OPt = new OfferPropertyTypes();
            // do update() from model/model.php
            $propertyconfig = $OPt->preparepropertyconfig();
            $propertyconfig = serialize($propertyconfig);
            //\Mini\Libs\Helper::vdw($propertyconfig);
            //update($name, $sort, $alias, $type, $propertyconfig, $id)
            $OPto = $OPt->get($_POST['id']);
            $OPCBt = new OfferPropertyCategoryBind();
            $OPCBl = $OPCBt->getByPropertyTypeID($_POST['id']);
            
            $OPt->update($_POST["name"], $_POST["sort"], $_POST["alias"], $_POST["type"], $propertyconfig, $_POST['id']);
            
            // get delete offercat ids
            $delofcatids = array();            
            if ($OPCBl!==FALSE) {  //not found in DB - nothing to delete
              foreach ($OPCBl as $k=>$val) {
                $found = FALSE;
                foreach ($_POST["offercategoryid"] as $offercategoryid) {
                  if ($offercategoryid==$val->idoffercategory) {
                    $found = TRUE;
                    break;
                  }
                }
                if (!$found) {
                  $delofcatids[] = $val->idoffercategory;
                } 
              }
            
              //\Mini\Libs\Helper::vdw($delofcatids);
              //idofferpropertycategorybind
              if (count($delofcatids)>0) {
                $todelete = $OPCBt->getByOfferCategoryAndPropertyTypeID($delofcatids, $_POST['id']);
                $todeleteidofferpropertycategorybinds = array();
                foreach ($todelete as $key=>$val) {
                  $todeleteidofferpropertycategorybinds[] = $val->id;
                }
                //\Mini\Libs\Helper::vdw($todeleteidofferpropertycategorybinds);
                $Ot = new Offers();
                $Ot->deleteoffervaluesByIdofferpropertycategorybind($todeleteidofferpropertycategorybinds); 
                $OPCBt->deleteByOfferCategoryAndPropertyTypeID($delofcatids, $_POST['id']);
              }
            }
            
            // get add offercat ids
            $addofcatids = array();
            foreach ($_POST["offercategoryid"] as $offercategoryid) {
              $found = FALSE;
              if ($OPCBl!==FALSE) {  //not found in DB - all to add  
                foreach ($OPCBl as $k=>$val) {
                  if ($offercategoryid==$val->idoffercategory) {
                    $found = TRUE;
                    break;
                  }
                }
              }
              if (!$found) {
                $addofcatids[] = $offercategoryid;
              } 
            }
            //\Mini\Libs\Helper::vdw($addofcatids);
            if (count($addofcatids)>0) {
              foreach ($addofcatids as $offercategoryid) {
                $OPCBt->add($_POST["name"], $_POST["sort"], $_POST["alias"], $offercategoryid, $_POST['id']);
              }
            }
            // where to go after song has been added
            header('location: ' . URL . 'offerpropertytypes/');
          }
        }
        }
    }
    
    public function getonevalue($id=FALSE)
    {
        // Instance new Model ()
        //$OPt = new OfferPropertyTypes();
        // getting all  and amount of 
        //$OPts = $OPt->getAll();
        // load views
        $this->title = 'Настройка свойств офферов. Одного значения';
        $OPt = new OfferPropertyTypes();
        if ($id===FALSE) {
          $this->propertyconfig = $OPt->initpropertyconfig('onevalue');
        } else {
        }
        //require APP . 'view/_templates/header.php';
        require APP . 'view/offerpropertytypes/types/onevalue.php';
        //require APP . 'view/_templates/footer.php';
    }

    public function getmultychoosevalue($id=FALSE)
    {
        // Instance new Model ()
        $OPt = new OfferPropertyTypes();
        // getting all  and amount of 
        //$OPts = $OPt->getAll();
        // load views
        $this->title = 'Настройка свойств офферов. Мультивыбор значение';
        
        if ($id===FALSE) {
          $this->propertyconfig = $OPt->initpropertyconfig('multychoosevalue');
        } else {
        }
        
        //require APP . 'view/_templates/header.php';
        require APP . 'view/offerpropertytypes/types/multychoosevalue.php';
        //require APP . 'view/_templates/footer.php';
    }

}
