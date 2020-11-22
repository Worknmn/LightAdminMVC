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

class OfferCategory extends Model
{
    /**
     */
    public function getAll()
    {
        $sql = "SELECT id, name, sort, url FROM offercategory";
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
    public function addCategory($name, $sort, $url)
    {
        $sql = "INSERT INTO offercategory (name, sort, url) VALUES (:name, :sort, :url)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':url' => $url);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        try {
          //$query->execute($parameters);
          if (!$query->execute($parameters)) throw new \PDOException('Ошибка добавления');
        } catch (\PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
        }
    }

    /**

     */
    public function deleteCategory($offercategory_id)
    {
        $sql = "DELETE FROM offercategory WHERE id = :offercategory_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':offercategory_id' => $offercategory_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     */
    public function getCategory($offercategory_id)
    {
        $sql = "SELECT id, name, sort, url FROM offercategory WHERE id = :offercategory_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':offercategory_id' => $offercategory_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**

     */
    public function updateCategory($name, $sort, $url, $id)
    {
        $sql = "UPDATE offercategory SET name = :name, sort = :sort, url = :url WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':url' => $url, ':id' => $id);

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
