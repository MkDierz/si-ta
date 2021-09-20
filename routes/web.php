<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManajemenUser;
use App\Http\Controllers\DataMahasiswa;
use App\Http\Controllers\DataDosen;
use App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Dosen;


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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['can:admin'])->prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('admin');
    Route::resources([
        'user' => ManajemenUser::class,
        'mahasiswa' => DataMahasiswa::class,
        'dosen' => DataDosen::class
    ]);
});

Route::middleware(['can:mahasiswa'])->prefix('mhs')->group(function (){
    Route::get('', [Mahasiswa::class, 'index'])->name('mhs');
    
    Route::get('/kehadiran', [Mahasiswa::class, 'kehadiran'])->name('kehadiran');

    Route::post('/kehadiran', [Mahasiswa::class, 'kehadiran_save'])->name('post.kehadiran');
    Route::post('/kelayakan', [Mahasiswa::class, 'kelayakan_save'])->name('post.kelayakan');
});

Route::middleware(['can:pembimbing'])->prefix('dosen')->group(function (){
    Route::get('', [Dosen::class, 'index'])->name('dosen');

    Route::get('/kelayakan/{id}', [Dosen::class, 'kelayakan'])->name('kelayakan.show');
    Route::put('/kelayakan/{id}', [Dosen::class, 'kelayakan_store'])->name('kelayakan.store');

    Route::get('/konsultasi/{id}', [Dosen::class, 'konsultasi'])->name('konsultasi.show');
    Route::put('/konsultasi/{id}', [Dosen::class, 'konsultasi_store'])->name('konsultasi.store');
});
