<?php
use App\controllers\HomeController;
use App\controllers\MembreController;
use App\Routes\Route;

Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/product', 'HomeController@product');


Route::get('/membres', 'MembreController@index');


Route::dispatch();