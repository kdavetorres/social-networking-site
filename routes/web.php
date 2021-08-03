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

Route::post('/follow/{userid}', [App\Http\Controllers\FollowController::class, 'store']);

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);

Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);

Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);

Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);


Route::get('/profile/{userid}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profiles.index');

Route::get('/profile/{userid}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profiles.edit');

Route::patch('/profile/{userid}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profiles.update');
