<?php
namespace App\models;
use App\models\CRUD;

class Membre extends CRUD {
    protected $table = "membres";
    protected $primaryKey = "id";
    protected $fillable = ['lName', 'fName', 'email', 'phone'];
}