<?php

use Illuminate\Support\Facades\Route;

// Главная всегда ведёт на мероприятия

// Страницы

Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'menu'])->name('menu');

Route::get('/users', [\App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');
Route::get('/events', [\App\Http\Controllers\Admin\AdminController::class, 'events'])->name('events');

Route::group(['prefix' => '/tasks'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\TaskController::class, 'index'])->name('tasks');
    Route::get('/create', [\App\Http\Controllers\Admin\TaskController::class, 'create'])->name('tasks.create');
    Route::post('/store', [\App\Http\Controllers\Admin\TaskController::class, 'store'])->name('tasks.store');
    Route::get('/edit/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/update/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'update'])->name('tasks.update');
    Route::post('/archive/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'archive'])->name('tasks.archive');
    Route::delete('/delete/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'delete'])->name('tasks.delete');

    Route::get('/types/create', [\App\Http\Controllers\Admin\TaskTypeController::class, 'create'])->name('tasks.types.create');
    Route::post('/types/store', [\App\Http\Controllers\Admin\TaskTypeController::class, 'store'])->name('tasks.types.store');
    Route::get('/categories/create', [\App\Http\Controllers\Admin\TaskCategoryController::class, 'create'])->name('tasks.categories.create');
    Route::post('/categories/store', [\App\Http\Controllers\Admin\TaskCategoryController::class, 'store'])->name('tasks.categories.store');
});

// Секция API
Route::prefix('api')->name('api.')->group(function () {
});
