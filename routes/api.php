<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertController;


Route::get('/adverts', [AdvertController::class, 'getAdverts']);
Route::post('/adverts', [AdvertController::class, 'storeAdverts']);

