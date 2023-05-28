<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::domain('events.' . Config::get('app.url'))->group(function () {
//    require __DIR__ . '/events.php';
//});

Route::redirect('/', '/login');

//Route::middleware('auth')->domain('tasks' . Config::get('app.url'))->group(function () {
//    require __DIR__ . '/tasks.php';
//});

//Route::middleware('auth')->domain('task' . Config::get('app.url'))->group(function () {
//    require __DIR__ . '/event.php';
//});



//require __DIR__ . '/auth.php';
