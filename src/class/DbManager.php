<?php 

require_once DIR . '/DbObject.php';

/**
 * La classe DbManager doit pouvoir gérer n'importe quelle table de votre base de donnée
 * 
 * Complétez les fonctions suivantes pour les faires fonctionner
 */

class DbManager {
    private $db;

    function __construct(PDO $db) {
        $this->db = $db;
    }

    // return l'id inseré
    function insert(string $sql, array $data) {
        $ins = $this->db ->prepare($sql);
        $ins -> execute($data);
        return $data;
    }

    function insert_advanced(DbObject $dbObj) {
        /$ins = $this->db ->prepare($sql);
        $ins -> execute($data);
        $ins->setFetchMode(PDO::FETCH_CLASS, 'ContcatForms');
        return $ins->fetchAll();/
    }

    function select(string $sql, array $data, string $className) {
        $sel = $this->db ->prepare($sql);
        $sel->execute($data);
        $sel->setFetchMode(PDO::FETCH_CLASS, $className);
        return $sel->fetchAll();
    }

    function getById(string $tableName, $id, string $className) {
        $gbi = $this->db ->prepare("SELECT FROM $tableName WHERE id = :id");
$gbi->execute(["id" => $id]);
        $result = $gbi->fetch(PDO::FETCH_ASSOC);
        $object = new $className();
        foreach ($result as $key => $value) {
            $object->$key = $value;
        }
        return $object;
    }




    function getById_advanced($id, string $className) {
        //$this->db -> prepare(getById($id), $className);
    }

    function getBy(string $tableName, string $column, $valeur, string $className) {
        $gb = $this->db ->prepare("SELECT $column FROM $tableName WHERE valeur = :valeur");
        $gb-> execute("valeur" => $valeur);
        $result = $gb->fetch(PDO::FETCH_ASSOC);
        $object = new $className();
        foreach ($result as $key => $value) {
            $object->$key = $value;
        } 
        return $object;
    }

    function getBy_advanced(string $column, $value, string $className) {

    }

    function removeById(string $tableName, $id) {
        //$this->db -> prepare($tableName.remove($id));
    }

    function update(string $tableName, array $data) {
        $upd = $this->db -> prepare($tableName);
        $upd->execute($data);
        return $tableName;
        return $data;
    }

    function update_advanced(DbObject $dbObj) {
        //$this->db ->prepare(update($dbObj));
    }

}