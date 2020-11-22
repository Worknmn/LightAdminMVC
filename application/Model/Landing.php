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

class Landing extends Model
{
    /**
     */
    
    public $tablename = 'landing'; 
     
    public function getAll()
    {
        $sql = "SELECT ".$this->tablename.".id AS id, ".$this->tablename.".name AS name, ".$this->tablename.".sort AS sort, ".$this->tablename.".alias AS alias, landingcategory.name AS category FROM ".$this->tablename." LEFT JOIN landingcategory ON landingcategory.id=".$this->tablename.".categoryid";
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
    public function add($name, $sort, $alias, $categoryid, $title, $description, $keywords, $h1, $uptext, $text, $downtext)
    {
        $sql = "INSERT INTO ".$this->tablename." (name, sort, alias, categoryid, title, description, keywords, h1, uptext, text, downtext) VALUES (:name, :sort, :alias, :categoryid, :title, :description, :keywords, :h1, :uptext, :text, :downtext)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name'=>$name, ':sort'=>$sort, ':alias'=>$alias, ':categoryid'=>$categoryid, ':title'=>$title, 
            ':description'=>$description, ':keywords'=>$keywords, ':h1'=>$h1, ':uptext'=>$uptext, ':text'=>$text, ':downtext'=>$downtext);

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
    public function delete($id)
    {
        $sql = "DELETE FROM ".$this->tablename." WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        try {
          //$query->execute($parameters);
          if (!$query->execute($parameters)) throw new \PDOException('Ошибка удаления');
        } catch (\PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
        }
    }

    /**
     */
    public function get1($id)
    {
        $sql = "SELECT id, name, sort, alias FROM ".$this->tablename." WHERE id = :id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        try {
          //$query->execute($parameters);
          if (!$query->execute($parameters)) throw new \PDOException('Ошибка получения данных');
        } catch (\PDOException $e) {    
          print "Error!: " . $e->getMessage() . "<br/>";
          die();
        }

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**

     */
    public function update1($name, $sort, $alias, $id)
    {
        $sql = "UPDATE ".$this->tablename." SET name = :name, sort = :sort, alias = :alias WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':id' => $id);

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
