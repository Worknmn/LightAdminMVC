<?php

/**
 *
 *
 */

namespace Mini\Model;

use Mini\Core\Model;

class Offers extends Model
{
    /**
     */
    
    public $tablename = 'offers'; 
    
    public function getAll()
    {
        $sql = "SELECT ".$this->tablename.".id AS id, ".$this->tablename.".name AS name, ".$this->tablename.".sort AS sort, ".$this->tablename.".alias AS alias, ".$this->tablename.".categoryid AS categoryid, offercategory.name AS category FROM ".$this->tablename." LEFT JOIN offercategory ON offercategory.id=".$this->tablename.".categoryid";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**$_POST["name"], $_POST["sort"],  $_POST["alias"], $_POST['refurl'], $_POST['categoryid']
     */
    public function add($name, $sort, $alias, $refurl, $imagefile, $text, $categoryid)
    {
        $sql = "INSERT INTO ".$this->tablename." (name, sort, alias, refurl, imagefile, text, categoryid) VALUES (:name, :sort, :alias, :refurl, :imagefile, :text, :categoryid)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':refurl' => $refurl, ':imagefile' => $imagefile, ':text' => $text, ':categoryid' => $categoryid);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        try {
          $query->execute($parameters);
          return $this->db->lastInsertId();
        } catch (PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
        }
    }
    
    public function addofferproperties($array)
    {
      $idoffer = $array['idoffer'];
      
      foreach ($array['values'] as $akey=>$rec) {
        $idofferpropertycategorybind = $akey;
        $name = '';
        $sort = 100;
        $alias = '';
        $value = $rec;
        $sql = "INSERT INTO offerpropertyvalues (name, sort, alias, value, idoffer, idofferpropertycategorybind) VALUES (:name, :sort, :alias, :value, :idoffer, :idofferpropertycategorybind)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':value' => $value, ':idoffer' => $idoffer, ':idofferpropertycategorybind' => $idofferpropertycategorybind);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        try {
          $query->execute($parameters);
          //return $this->db->lastInsertId();
        } catch (PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
        }
      }
      
    }
    
    public function updateofferproperties($array)
    {
      $idoffer = $array['idoffer'];
      
      foreach ($array['values'] as $akey=>$rec) {
        $id = $akey;
        $name = '';
        $sort = 100;
        $alias = '';
        $value = $rec;
        $sql = "UPDATE offerpropertyvalues SET name = :name, sort = :sort, alias = :alias, value = :value, idoffer = :idoffer WHERE id = :id"; //, idofferpropertycategorybind = :idofferpropertycategorybind
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':value' => $value, ':idoffer' => $idoffer, ':id' => $id); //, ':idofferpropertycategorybind' => $idofferpropertycategorybind

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        try {
          $query->execute($parameters);
          //return $this->db->lastInsertId();
        } catch (PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
        }
      }
      
    }

    /**
     */
    public function delete($id)
    {
        $this->deleteoffervalues($id);
        
        $sql = "DELETE FROM ".$this->tablename." WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    
    public function deleteoffervalues($idoffer)
    {
        $sql = "DELETE FROM offerpropertyvalues WHERE idoffer = :idoffer";
        $query = $this->db->prepare($sql);
        $parameters = array(':idoffer' => $idoffer);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    
    public function deleteoffervaluesByIdofferpropertycategorybind($ids)
    {
        $sql = "DELETE FROM offerpropertyvalues WHERE idofferpropertycategorybind IN (" . implode(',', $ids) . ")";
        $query = $this->db->prepare($sql);
        //$parameters = array(':idoffer' => $idoffer);
        $parameters = array();

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    
    public function deleteoffervaluesByPropertyTypeID($ids)
    {
    
        if (is_array($ids)) {
          $idsv = implode(',', $ids);
        } else {
          $idsv = $ids;
        }
    
        $sql = "DELETE FROM offerpropertyvalues WHERE idofferpropertycategorybind IN (SELECT id FROM offerpropertycategorybind WHERE idofferpropertytype IN (" . $idsv . "))";
        
        $query = $this->db->prepare($sql);
        //$parameters = array(':idoffer' => $idoffer);
        $parameters = array();

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    
    public function deleteoffervaluesByOfferCategoryID($ids)
    {
    
        if (is_array($ids)) {
          $idsv = implode(',', $ids);
        } else {
          $idsv = $ids;
        }
    
        $sql = "DELETE FROM offerpropertyvalues WHERE idofferpropertycategorybind IN (SELECT id FROM offerpropertycategorybind WHERE idoffercategory IN (" . $idsv . "))";
        
        $query = $this->db->prepare($sql);
        //$parameters = array(':idoffer' => $idoffer);
        $parameters = array();

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * @param integer 
     */
    public function get($offerid)
    {
        $sql = "SELECT id, name, sort, alias, refurl, imagefile, text, categoryid FROM ".$this->tablename." WHERE id = :offerid LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':offerid' => $offerid);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**$_POST["name"], $_POST["sort"], $_POST["alias"], $_POST["refurl"], $_POST["offercategoryid"], $_POST['id']
     */
    public function update($name, $sort, $alias, $refurl, $imagefile, $text, $offercategoryid, $id)
    {
        $o = $this->get($id);
        $sql = "UPDATE ".$this->tablename." SET name = :name, sort = :sort, alias = :alias, refurl = :refurl, imagefile = :imagefile, text = :text, categoryid = :offercategoryid WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':refurl' => $refurl, ':imagefile' => $imagefile, ':text' => $text, ':offercategoryid' => $offercategoryid, ':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        try {
          $query->execute($parameters);
        } catch (PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
        }
        //if ($o->categoryid!=$offercategoryid) {
        if (TRUE) {   //дань скорости разработки - перезаписываем при обнобновлении
          $this->deleteoffervalues($id);

          // do addCategory() in model/model.php
          $values = $this->preparevalues();
          
          if ($values!=FALSE) {
            $a['idoffer'] = $id;
            
            //die($oid);
            $a['values'] = $values;
            
            //\Mini\Libs\Helper::vdw($a);
            //die();
            
            $this->addofferproperties($a);
          }
        } else {
          // do addCategory() in model/model.php
          $values = $this->preparevaluesforupdate($id);
          if ($values!=FALSE) {          
            //\Mini\Libs\Helper::vdw($values);
            //die();
            
            $a['idoffer'] = $id;
            
            //die($oid);
            $a['values'] = $values;
            
            $this->updateofferproperties($a);
          }
        }
    }
    
    public function getpropertiesforcategory($offercategoryid) {
        //$sql = "SELECT id, name, sort, idofferpropertytype FROM offerpropertycategorybind WHERE idoffercategory = :offercategoryid";
        
        $sql = "SELECT offerpropertycategorybind.id AS id, offerpropertytypes.id AS offerpropertytypeid, offerpropertytypes.name AS typename, offerpropertytypes.type AS type, offerpropertytypes.propertyconfig AS propertyconfig, offerpropertycategorybind.sort AS sort, offerpropertycategorybind.name AS opcbname FROM offerpropertycategorybind LEFT JOIN offerpropertytypes ON offerpropertytypes.id=offerpropertycategorybind.idofferpropertytype WHERE idoffercategory = :offercategoryid";
        
        $query = $this->db->prepare($sql);
        $parameters = array(':offercategoryid' => $offercategoryid);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetchAll() : false);
    }
    
    public function getpropertiesforoffer($offerid) {
        //$sql = "SELECT id, name, sort, idofferpropertytype FROM offerpropertycategorybind WHERE idoffercategory = :offercategoryid";
        
        $sql = "SELECT offerpropertyvalues.id AS id, offerpropertyvalues.value AS value, offerpropertycategorybind.id AS offerpropertycategorybindid, offerpropertytypes.id AS offerpropertytypeid, offerpropertytypes.name AS typename, offerpropertytypes.type AS type, offerpropertytypes.propertyconfig AS propertyconfig, offerpropertycategorybind.sort AS sort, offerpropertycategorybind.name AS opcbname FROM offerpropertyvalues LEFT JOIN offerpropertycategorybind ON offerpropertycategorybind.id=offerpropertyvalues.idofferpropertycategorybind LEFT JOIN offerpropertytypes ON offerpropertytypes.id=offerpropertycategorybind.idofferpropertytype WHERE offerpropertyvalues.idoffer = :offerid";
        
        $query = $this->db->prepare($sql);
        $parameters = array(':offerid' => $offerid);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetchAll() : false);
    }
    
    public function getpropertiesforofferunion($idoffer) {
        
        $offer = $this->get($idoffer);
        
        $propertyvalues = $this->getpropertiesforoffer($idoffer);
        
        $propertiescategory = $this->getpropertiesforcategory($offer->categoryid);
        
        if ($propertiescategory!==FALSE) { 
          foreach ($propertiescategory as $pckey=>$pcvalue) {
            $found = FALSE;
            foreach ($propertyvalues as $pvkey=>$pvalue) {
              if ($pvalue->offerpropertycategorybindid==$pcvalue->id) {
                $propertiescategory[$pckey] = $pvalue;
                $propertiescategory[$pckey]->id = $pvalue->offerpropertycategorybindid; //дань скорости разработки - перезаписываем при обнобновлении
                $found = TRUE;
                break;
              }
            }
            if ($found) {} 
            else { }//$propertiescategory[$pckey]->value = NULL; }
          }
        }
        
        //\Mini\Libs\Helper::vdw($propertyvalues);
        //\Mini\Libs\Helper::vdw($propertiescategory);

        // fetch() is the PDO method that get exactly one result 
        return $propertiescategory;
    }
    
    public function preparevalues() {
      if (isset($_POST["submit_add_offer"]) OR isset($_POST["submit_edit_offer"])) {
        //if (isset($_POST["id"]) AND ((int)$_POST["id"]>0)) {
        //}
        $values = array();
        if (isset($_POST["offercategoryid"]) AND ((int)$_POST["offercategoryid"]>0)) {
          $ocid = $_POST["offercategoryid"];
          $types = $this->getpropertiesforcategory($ocid);
          if ($types!=FALSE) {
            if (count($types)>0) {
              foreach ($types as $akey=>$type) {
                
                /*
                $values[] = array(
                    'offerpropertycategorybindid'=>$type->id,
                    'type'=>$type->type,
                    'value'=>$_POST["value-".$type->id],
                    );*/
                if ($type->type=='onevalue') { 
                  $values[$type->id] = $_POST["value-".$type->id];
                } elseif ($type->type=="multychoosevalue") {
                  $values[$type->id] = serialize($_POST["value-".$type->id]);
                }
              }
              return $values;
            }
          }
        }
      }
      return FALSE;
    }
    
    public function preparevaluesforupdate($id) {
      if (isset($_POST["submit_edit_offer"])) {
        //if (isset($_POST["id"]) AND ((int)$_POST["id"]>0)) {
        //}
        $values = array();
        
        if ($id>0) {
          $storevalues = $this->getpropertiesforoffer($id);
          if (count($storevalues)>0) {
            foreach ($storevalues as $akey=>$value) {
                if ($value->type=='onevalue') { 
                  $values[$value->id] = $_POST["value-".$value->id];
                } elseif ($value->type=="multychoosevalue") {
                  $values[$value->id] = serialize($_POST["value-".$value->id]);
                }
              //$values[$value->id] = $_POST["value-".$value->id];
            }
            return $values;
          }
        }
      }
      return FALSE;
    }

    /**
     
    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
    }
    */
}
