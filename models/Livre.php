<?php
namespace App\Models;
use App\models\CRUD;

class Livre extends CRUD {
    protected $table = "livres";
    protected $primaryKey = "id";
    protected $fillable = ['titre', 'auteur', 'categorie_id', 'anneePublication'];
}