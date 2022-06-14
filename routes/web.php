<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;


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

Route::get('baca', [HomeController::class,'baca']);
Route::get('pas', [PasienController::class,'index']);
Route::get('lihat', [HomeController::class,'lihat']);

Route::get('/admin', [AdminController::class,'index'])->name('admin');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

  
Route::middleware(['auth', 'user-access:pasienParent'])->group(function () {
  
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'pasienParentHome'])->name('home');
    // Route::get('/pasienP/home', [App\Http\Controllers\HomeController::class, 'pasienParentHome'])->name('pasienP.home');
});

Route::middleware(['auth', 'user-access:pasienChild'])->group(function () {
    Route::get('/pasienC/home', [App\Http\Controllers\HomeController::class, 'pasienChildHome'])->name('pasienC.home');
});

Route::middleware(['auth', 'user-access:dokter'])->group(function () {
  
    // Route::get('/dokter/home', [App\Http\Controllers\HomeController::class, 'dokterHome'])->name('dokter.home');
    Route::get('/dokter/home', [App\Http\Controllers\HomeController::class, 'dokterHome'])->name('dokter.home');
});

Route::middleware(['auth', 'user-access:apotik'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
    Route::get('/apotik/home', [App\Http\Controllers\HomeController::class, 'apotikHome'])->name('apotik.home');
});


Route::middleware(['auth', 'user-access:lab'])->group(function () {
  
    Route::get('/lab/home', [App\Http\Controllers\HomeController::class, 'labHome'])->name('lab.home');
});



Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('home');

    // Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
});


Route::middleware(['auth', 'user-access:support'])->group(function () {
  
    Route::get('/support/home', [App\Http\Controllers\HomeController::class, 'supportHome'])->name('support.home');
});


Route::middleware(['auth', 'user-access:manejemen'])->group(function () {
  
    Route::get('/manej/home', [App\Http\Controllers\HomeController::class, 'manejHome'])->name('manej.home');
});



Route::middleware(['auth', 'user-access:validator'])->group(function () {
  
    Route::get('/validator/home', [App\Http\Controllers\HomeController::class, 'validatorHome'])->name('validator.home');
});

