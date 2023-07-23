<?php

use Illuminate\Support\Facades\Route;

// Страницы

Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'menu'])->name('menu');

Route::get('/users', [\App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');
Route::get('/events', [\App\Http\Controllers\Admin\AdminController::class, 'events'])->name('events');

Route::prefix('tasks')->name('tasks.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\TaskController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Admin\TaskController::class, 'create'])->name('create');
    Route::post('/store', [\App\Http\Controllers\Admin\TaskController::class, 'store'])->name('store');
    Route::get('/edit/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'edit'])->name('edit');
    Route::patch('/update/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'update'])->name('update');
    Route::post('/archive/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'archive'])->name('archive');
    Route::delete('/delete/{task}', [\App\Http\Controllers\Admin\TaskController::class, 'delete'])->name('delete');

    Route::prefix('types')->name('types.')->group(function () {
        Route::get('/types', [\App\Http\Controllers\Admin\TaskTypeController::class, 'index'])->name('index');
        Route::get('/types/create', [\App\Http\Controllers\Admin\TaskTypeController::class, 'create'])->name('create');
        Route::post('/types/store', [\App\Http\Controllers\Admin\TaskTypeController::class, 'store'])->name('store');
        Route::post('/types/edit/{type}', [\App\Http\Controllers\Admin\TaskTypeController::class, 'edit'])->name('edit');
        Route::post('/types/delete/{type}', [\App\Http\Controllers\Admin\TaskTypeController::class, 'delete'])->name('delete');
    });

    Route::prefix('categories')->name('categories.')->group(function() {
        Route::get('/categories', [\App\Http\Controllers\Admin\TaskCategoryController::class, 'index'])->name('index');
        Route::get('/categories/create', [\App\Http\Controllers\Admin\TaskCategoryController::class, 'create'])->name('create');
        Route::post('/categories/store', [\App\Http\Controllers\Admin\TaskCategoryController::class, 'store'])->name('store');
        Route::post('/categories/edit/{category}', [\App\Http\Controllers\Admin\TaskCategoryController::class, 'edit'])->name('edit');
        Route::post('/categories/delete/{category}', [\App\Http\Controllers\Admin\TaskCategoryController::class, 'delete'])->name('delete');
    });
});

// Секция API
Route::prefix('api')->name('api.')->group(function () {
});
