<?php

use Proton\Http\Route;
use App\Controllers\AuthController;


Route::get('/login',[AuthController::class, 'login']);

