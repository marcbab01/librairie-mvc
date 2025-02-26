<?php
abstract namespace App/models;

class CRUD extends \PDO {
    final public function __construct() {
        parent::__construct('mysql:host=localhost; dbname=librairie_db; port=3306; charset=utf8', 'root', '');

    }

    final public function select($field = null, $order = 'ASC') {
        if($field == null) {
            $field = this->primaryKey;
        }
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }
}