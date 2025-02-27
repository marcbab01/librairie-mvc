<?php
use App\controllers\HomeController;
use App\controllers\MembreController;
use App\Routes\Route;

Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/product', 'HomeController@product');


Route::get('/membres', 'MembreController@index');
Route::get('/membre/create', 'MembreController@create');
Route::post('/membre/create', 'MembreController@store');
Route::get('/membre/show', 'MembreController@show');
Route::get('/membre/edit', 'MembreController@edit');
Route::post('/membre/edit', 'MembreController@update');
Route::post('/membre/delete', 'MembreController@delete');

Route::get('/livres', 'LivreController@index');
Route::get('/livre/create', 'LivreController@create');
Route::post('/livre/create', 'LivreController@store');
Route::get('/livre/show', 'LivreController@show');
Route::get('/livre/edit', 'LivreController@edit');
Route::post('/livre/edit', 'LivreController@update');
Route::post('/livre/delete', 'LivreController@delete');


Route::dispatch();