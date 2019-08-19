<?php
/*
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('almacen/categoria','CategoriaController');

