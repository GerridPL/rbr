<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::middleware(['auth'])->group(function () {
    Route::name('comments.')->prefix('comments')->group(function () {
        Route::get('', [CommentController::class, 'index'])
            ->name('index');
    });
    Route::name('posts.')->prefix('posts')->group(function () {
        Route::get('', [PostController::class, 'index'])
            ->name('index');
    });
    Route::name('users.')->prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])
            ->name('index');
    });
});

