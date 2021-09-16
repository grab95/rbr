<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->action([PostController::class, 'index']);
});



// User routes
Route::get('/users/add-or-update', [UserController::class, 'addOrUpdate']);
Route::get('/users/most-active', [UserController::class, 'mostActive'])->name('users.mostActive');
Route::get('/users/{user}', [UserController::class, 'show']);


// Post routes
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/add-or-update', [PostController::class, 'addOrUpdate']);
Route::get('/posts/{post}', [PostController::class, 'show']);


