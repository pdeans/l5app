<?php


Route::get('/', 'HomeController@index');

Route::controller('/','Auth\AuthController');
