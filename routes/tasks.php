<?php

use Illuminate\Support\Facades\Route;

// Главная всегда ведёт на мероприятия
Route::redirect('/', 'tasks');

Route::inertia('/tasks', 'Tasks/Task/Tasks')->name('tasks');

//Route::get('/task/{task}', [\App\Http\Controllers\Events\EventController::class, 'show'])->name('event');

// Страницы
//Route::group(['middleware' => 'auth'], function () {
//    Route::inertia('/teams', 'Events/Team/Teams')->name('teams');
//    Route::get('/team/{team}', [\App\Http\Controllers\Events\TeamController::class, 'show'])->name('team');
//});


// Секция API
//Route::prefix('api')->name('api.')->group(function () {
//    Route::get('/events', [\App\Http\Controllers\Events\EventController::class, 'index'])->name('events');
//
//    Route::get('/teams', [\App\Http\Controllers\Events\TeamController::class, 'index'])->name('teams');
//});
