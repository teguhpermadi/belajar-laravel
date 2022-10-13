<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunController;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Auth::routes();

Route::group(['middleware' => ['auth', 'tahunAjaran']], function () {
        Route::get('/home', function () {
            return view('home');
        })->name('home');

        Route::resource('sekolah', ProfilSekolahController::class);

        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::post('update_avatar', [UserController::class, 'update_avatar'])->name('update_avatar');
        Route::post('update_profile', [UserController::class, 'update_profile'])->name('update_profile');
        Route::post('update_emailpassword', [UserController::class, 'update_emailpassword'])->name('update_emailpassword');
        Route::post('delete_avatar', [UserController::class, 'delete_avatar'])->name('delete_avatar');

        Route::get('kelas/data', [KelasController::class, 'anyData'])->name('kelas.data');
        Route::get('kelas/data/rombel/{id}', [KelasController::class, 'siswa_rombel'])->name('kelas.siswaRombel');
        Route::resource('kelas', KelasController::class);
        Route::get('siswa/data', [SiswaController::class, 'anyData'])->name('siswa.data');
        Route::resource('siswa', SiswaController::class);
        Route::get('guru/data', [GuruController::class, 'anyData'])->name('guru.data');
        Route::resource('guru', GuruController::class);
        Route::get('tahun/data', [TahunController::class, 'anyData'])->name('tahun.data');
        Route::resource('tahun', TahunController::class);
        Route::get('users/data', [UsersController::class, 'anyData'])->name('users.data');
        Route::resource('users', UsersController::class);

        Route::get('/tes', function(){
            return session()->get('tahun_id');
        });
});

Route::group(['prefix' => 'siakad/', 'middleware' => 'tahunAjaran'], function () {
    Route::get('/user', function () {
        return 'user';
    })->name('tes');

    Route::get('/two', function ()    {
        return Tahun::select('id')->latest()->first();
    });
});

Route::get('/tes', function ()    {
    dd(User::where('is_active', '1')->role('user')->get());
});