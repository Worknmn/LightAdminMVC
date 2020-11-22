<?php

/**
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Model;

use Mini\Core\Model;

class OfferPropertyTypes extends Model
{
    public $tablename = 'offerpropertytypes';
    
    public function getAll()
    {
        $sql = "SELECT id, name, type, sort, alias, propertyconfig FROM ".$this->tablename;
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**

     */
    public function add($name, $sort, $alias, $type, $propertyconfig)
    {
        $sql = "INSERT INTO ".$this->tablename." (name, sort, alias, type, propertyconfig) VALUES (:name, :sort, :alias, :type, :propertyconfig)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':type'=>$type, ':propertyconfig'=>$propertyconfig);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        try {
          //throw new \PDOException('Ошибка добавления', 12);
          if (!$query->execute($parameters)) throw new \PDOException('Ошибка добавления');
          //$query->execute($parameters);
          return $this->db->lastInsertId();
        } catch (\PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
          return FALSE;
        }
        return TRUE;
    }

    /**
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int  Id of 
     */
    public function delete($id)
    {
        $sql = "DELETE FROM ".$this->tablename." WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * @param integer 
     */
    public function get($id)
    {
        $sql = "SELECT id, name, sort, alias, type, propertyconfig FROM ".$this->tablename." WHERE id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function update($name, $sort, $alias, $type, $propertyconfig, $id)
    {
        $sql = "UPDATE ".$this->tablename." SET name = :name, sort = :sort, alias = :alias, type = :type, propertyconfig = :propertyconfig WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':type' => $type, ':propertyconfig' => $propertyconfig, ':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        try {
          //$query->execute($parameters);
          if (!$query->execute($parameters)) throw new \PDOException('Ошибка обновления');
        } catch (\PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
        }
    }
    
    public function preparepropertyconfig() {
            switch ($_POST["type"]) {
              case "onevalue":
                //$propertyconfig = array("unit" => $_POST["unit"],"textafter" => $_POST["textafter"]);
                $propertyconfig = array();
                break;
              case "multychoosevalue":
                $a = explode(";", $_POST["values"]);
                foreach ($a as $key=>$val) {
                  $a[$key] = trim($val);
                }
                //$propertyconfig = array("values" => $a,"textafter" => $_POST["textafter"]);
                $propertyconfig = array("values" => $a);
                break;
              default :
                $propertyconfig = array();
            }
            return $propertyconfig;
    }
    
    public function initpropertyconfig($type) {
            switch ($type) {
              case "onevalue":
                //$propertyconfig = array("unit" => "","textafter" => "");
                $propertyconfig = array();
                break;
              case "multychoosevalue":
                $a = array();
                //$propertyconfig = array("values" => $a,"textafter" => "");
                $propertyconfig = array("values" => $a);
                break;
              default :
                $propertyconfig = array();
            }
            return $propertyconfig;
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
