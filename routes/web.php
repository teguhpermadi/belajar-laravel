<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

// profil user
Route::group(['middleware' => ['auth', 'role:active']], function () {
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::get('tahun/getdata', [TahunController::class, 'getData'])->name('tahun.getdata');
    Route::resource('sekolah', ProfilSekolahController::class);
});

Route::get('guru/data', [GuruController::class, 'anyData'])->name('guru.data');
Route::resource('guru', GuruController::class);
Route::resource('tahun', TahunController::class);

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('update_avatar', [UserController::class, 'update_avatar'])->name('update_avatar');
    Route::post('update_profile', [UserController::class, 'update_profile'])->name('update_profile');
    Route::post('update_emailpassword', [UserController::class, 'update_emailpassword'])->name('update_emailpassword');
    Route::post('delete_avatar', [UserController::class, 'delete_avatar'])->name('delete_avatar');
});

Route::get('tes', function(Request $request){
   return Auth::user()->load(['identitas'])->identitas->fullname;
});