<?php
abstract namespace App/models;

class CRUD extends \PDO {
    final public function __construct() {
        parent::__construct('mysql:host=localhost; dbname=librairie_db; port=3306; charset=utf8', 'root', '');

    }
}