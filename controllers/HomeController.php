<?php

namespace App\Controllers;

class HomeController {
    public function index() {
        $data = "Hello from the other Side";
        include('views/home.php');
    }
}