<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\HomeController;


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

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:pasien'])->group(function () {
  
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'lihat'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:dokter'])->group(function () {
  
    // Route::get('/dokter/home', [App\Http\Controllers\HomeController::class, 'dokterHome'])->name('dokter.home');
    Route::get('/dokter/home', [App\Http\Controllers\HomeController::class, 'lihat'])->name('dokter.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:apotik'])->group(function () {
  
    Route::get('/manager/home', [App\Http\Controllers\HomeController::class, 'managerHome'])->name('manager.home');
});
 