<?php

include('models/ExampleModel.php');

class HomeController {
    public function index() {
        $data = "Hello from the other Side";
        include('views/home.php');
    }
}