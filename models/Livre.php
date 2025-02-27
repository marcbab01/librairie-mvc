<?php
namespace App\models;
use App\models\CRUD;

class Membre extends CRUD {
    protected $table = "livres";
    protected $primaryKey = "id";
    protected $fillable = ['titre', 'auteur', 'categorie_id', 'anneePublication'];
}