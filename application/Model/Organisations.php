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

class Organisations extends Model
{
    /**
     */
    
    public $tablename = 'organisationo';
    
    public function getAll()
    {
        $sql = "SELECT id, name, sort, alias FROM ".$this->tablename;
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
$_POST["name"], $_POST["sort"],  $_POST["alias"], $_POST['email'], $_POST['worktime'], $_POST['adress'], $_POST['position']
     */
    public function add($name, $sort, $alias, $email, $worktime, $adress, $position)
    {
        $sql = "INSERT INTO ".$this->tablename." (name, sort, alias, email, worktime, adress, position) VALUES (:name, :sort, :alias, :email, :worktime, :adress, :position)";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':email' => $email, ':worktime' => $worktime, ':adress' => $adress, ':position' => $position);

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
    public function get($id)
    {
        $sql = "SELECT id, name, sort, alias, email, worktime, adress, position FROM ".$this->tablename." WHERE id = :id LIMIT 1";
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
    $_POST["name"], $_POST["sort"],  $_POST["alias"], $_POST['email'], $_POST['worktime'], $_POST['adress'], $_POST['position'], $_POST['id']
     */
    public function update($name, $sort, $alias, $email, $worktime, $adress, $position, $id)
    {
        $sql = "UPDATE ".$this->tablename." SET name = :name, sort = :sort, alias = :alias, email = :email, worktime = :worktime, adress = :adress, position = :position WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':sort' => $sort, ':alias' => $alias, ':email' => $email, ':worktime' => $worktime, ':adress' => $adress, ':position' => $position, ':id' => $id);

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
