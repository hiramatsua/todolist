<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/todolist', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/todolist/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');
    Route::get('/todolist/menu', [App\Http\Controllers\HomeController::class, 'menu'])
        ->name('menu');
// カテゴリ追加
    Route::get('/todolist/categories/create', [App\Http\Controllers\CategoryController::class, 'showCreateForm'])
        ->name('categories.create');
    Route::post('/todolist/categories/create', [App\Http\Controllers\CategoryController::class, 'create']);
// カテゴリ更新
    Route::get('/todolist/categories/edit',[App\Http\Controllers\CategoryController::class, 'showEditForm'])
        ->name('categories.edit');
    Route::get('/todolist/categories/{id}/update', [App\Http\Controllers\CategoryController::class, 'showUpdateForm'])
        ->name('categories.update');
    Route::post('/todolist/categories/{id}/update', [App\Http\Controllers\CategoryController::class, 'update']);

// タスク一覧
    Route::get('/todolist/categories/{id}/tasks', [App\Http\Controllers\TaskController::class, 'index'])
        ->name('tasks.index');
// タスク追加
    Route::get('/todolist/categories/{category_id}/tasks/create', [App\Http\Controllers\TaskController::class, 'showCreateForm'])
        ->name('tasks.create');
    Route::post('/todolist/categories/{category_id}/tasks/create', [App\Http\Controllers\TaskController::class, 'create']);
// タスク更新
    Route::get('/todolist/categories/{id}/tasks/{task_id}/edit',[App\Http\Controllers\TaskController::class, 'showEditForm'])
        ->name('tasks.edit');
    Route::post('/todolist/categories/{id}/tasks/{task_id}/edit', [App\Http\Controllers\TaskController::class, 'edit']);
// タスク削除
    Route::delete('/todolist/categories/{id}/tasks/{task_id}', [App\Http\Controllers\TaskController::class, 'destroy'])
        ->name('tasks.destroy');

    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'loggedOut'])
    ->name('logout');
});