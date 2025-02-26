<?php
namespace App\controllers;

use App\models\Membre;

class ClientController {
    public function index() {
        $membre = new Membre;
        $select = $membre->select('fname');
        include('views/membre/index.php');
        print_r($select);
    }
}