<?php

use Proton\Http\Route;


Route::get('/', function () {
    return view('welcome');
});