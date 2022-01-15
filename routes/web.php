<?php

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
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::post('update_avatar', [UserController::class, 'update_avatar'])->name('update_avatar');
Route::post('update_profile', [UserController::class, 'update_profile'])->name('update_profile');
Route::post('update_emailpassword', [UserController::class, 'update_emailpassword'])->name('update_emailpassword');
Route::post('delete_avatar', [UserController::class, 'delete_avatar'])->name('delete_avatar');
