<?php

use Illuminate\Support\Facades\Route;

// Главная всегда ведёт на мероприятия

// Страницы

Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'menu'])->name('menu');

Route::get('/users', [\App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');
Route::get('/events', [\App\Http\Controllers\Admin\AdminController::class, 'events'])->name('events');

Route::get('/tasks', [\App\Http\Controllers\Admin\TaskController::class, 'index'])->name('tasks');
Route::get('/tasks/types', [\App\Http\Controllers\Admin\TaskController::class, 'getTypes'])->name('tasks.types');
Route::get('/tasks/create', [\App\Http\Controllers\Admin\TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [\App\Http\Controllers\Admin\TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/edit/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'edit'])->name('tasks.edit');
Route::patch('/tasks/update/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'update'])->name('tasks.update');
Route::post('/tasks/archive/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'archive'])->name('tasks.archive');
Route::delete('/tasks/delete/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'delete'])->name('tasks.delete');

// Секция API
Route::prefix('api')->name('api.')->group(function () {
});
