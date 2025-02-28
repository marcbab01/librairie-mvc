<?php
namespace App\Models;
use App\Models\CRUD;

class Membre extends CRUD {
    protected $table = "membres";
    protected $primaryKey = "id";
    protected $fillable = ['lName', 'fName', 'email', 'phone'];
}