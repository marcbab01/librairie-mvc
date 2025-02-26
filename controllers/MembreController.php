<?php
namespace App\controllers;

use App\models\Membre;

class ClientController {
    public function index() {
        $membre = new Membre;
        $select = $membre->select('fname');
        print_r($select);
    }
}