<?php

namespace Mini\Model;

use Mini\Core\Model;

class OfferPropertyCategoryBind extends Model
{

    public $tablename = 'offerpropertycategorybind';

    public function getAll()
    {
        $sql = "SELECT offerpropertycategorybind.id AS id, offerpropertycategorybind.name AS name, offercategory.id AS offercategoryid, offercategory.name AS catname, offerpropertytypes.id AS offerpropertytypeid, offerpropertytypes.name AS typename, offerpropertycategorybind.sort AS sort FROM offerpropertycategorybind LEFT JOIN offercategory ON offercategory.id=offerpropertycategorybind.idoffercategory LEFT JOIN offerpropertytypes ON offerpropertytypes.id=offerpropertycategorybind.idofferpropertytype";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }


    public function add($name, $sort, $alias, $idoffercategory, $idofferpropertytype)
    {
        $sql = "INSERT INTO ".$this->tablename." (name, sort, alias, idoffercategory, idofferpropertytype) VALUES (:name, :sort, :alias, :idoffercategory, :idofferpropertytype)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':idoffercategory'=>$idoffercategory, ':idofferpropertytype'=>$idofferpropertytype);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        try {
          //throw new \PDOException('Ошибка добавления', 12);
          if (!$query->execute($parameters)) throw new \PDOException('Ошибка добавления');
          //$query->execute($parameters);
        } catch (\PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
          return FALSE;
        }
        return TRUE;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM ".$this->tablename." WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    
    public function deleteByOfferCategoryID($ids)
    {
    
        if (is_array($ids)) {
          $idsv = implode(',', $ids);
        } else {
          $idsv = $ids;
        }
    
        $sql = "DELETE FROM ".$this->tablename." WHERE idoffercategory IN (" . $idsv . ")";
        //\Mini\Libs\Helper::vdw($sql);
        $query = $this->db->prepare($sql);
        //$parameters = array(':ids' => $ids);
        $parameters = array();

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function deleteByPropertyTypeID($ids)
    {
        if (is_array($ids)) {
          $idsv = implode(',', $ids);
        } else {
          $idsv = $ids;
        }
        $sql = "DELETE FROM ".$this->tablename." WHERE idofferpropertytype IN (" . $idsv . ")";
        //\Mini\Libs\Helper::vdw($sql);
        $query = $this->db->prepare($sql);
        //$parameters = array(':ids' => $ids);
        $parameters = array();

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
    
    public function deleteByOfferCategoryAndPropertyTypeID($ids, $idofferpropertytype)
    {
        $sql = "DELETE FROM ".$this->tablename." WHERE idoffercategory IN (" . implode(',', $ids) . ") AND idofferpropertytype = :idofferpropertytype";
        //\Mini\Libs\Helper::vdw($sql);
        $query = $this->db->prepare($sql);
        //$parameters = array(':ids' => $ids);
        $parameters = array(':idofferpropertytype' => $idofferpropertytype);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     */
    public function get($id)
    {
        $sql = "SELECT id, name, sort, alias, idoffercategory, idofferpropertytype FROM ".$this->tablename." WHERE id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetch() : false);
    }
    
    public function getByPropertyTypeID($id)
    {
        $sql = "SELECT id, name, sort, alias, idoffercategory, idofferpropertytype FROM ".$this->tablename." WHERE idofferpropertytype = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetchAll() : false);
    }
    
    public function getByOfferCategoryAndPropertyTypeID($ids, $idofferpropertytype)
    {
        $sql = "SELECT id, name, sort, alias, idoffercategory, idofferpropertytype FROM ".$this->tablename." WHERE idoffercategory IN (" . implode(',', $ids) . ") AND idofferpropertytype = :idofferpropertytype";
        $query = $this->db->prepare($sql);
        //$parameters = array(':id' => $id);
        $parameters = array(':idofferpropertytype' => $idofferpropertytype);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetchAll() : false);
    }

    public function update($name, $sort, $alias, $idoffercategory, $idofferpropertytype, $id)
    {
        $sql = "UPDATE ".$this->tablename." SET name = :name, sort = :sort, alias = :alias, idoffercategory = :idoffercategory, idofferpropertytype = :idofferpropertytype WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':idoffercategory' => $idoffercategory, ':idofferpropertytype' => $idofferpropertytype, ':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        try {
          $query->execute($parameters);
        } catch (\PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
        }
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
