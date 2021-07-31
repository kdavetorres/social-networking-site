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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);

Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);

Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);

Auth::routes();

Route::get('/profile/{userid}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('home');

Route::get('/profile/{userid}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
