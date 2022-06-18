<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\NotificationController; //notif

use App\Http\Controllers\ProductAjaxController;
use App\Http\Controllers\ImportData\DariExcelController;

use App\Http\Controllers\Pasienc\PasiencController;
use App\Http\Controllers\Pasienp\PasienpController;

use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Apotik\ApotikController;
use App\Http\Controllers\Laboratorium\LabController;

use App\Http\Controllers\Manejemen\ManejemenController;
use App\Http\Controllers\Support\SupportController;
use App\Http\Controllers\Validator\ValidatorController;

use App\Http\Controllers\Admins\AdminsController;
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

Route::resource('admins', AdminsController::class,[
    'only' => ['index', 'create', 'store']
]);

Route::resource('pasienp', PasienpController::class);
Route::resource('pasienc', PasiencController::class);

Route::resource('dokters', DokterController::class);
Route::resource('apotiks', ApotikController::class);
Route::resource('labs', LabController::class);

Route::resource('manajemens', ManejemenController::class);
Route::resource('supports', SupportController::class);
Route::resource('validators', ValidatorController::class);

Route::controller(DariExcelController::class)->group(function(){
    Route::get('importDataFasten', 'index');
    Route::post('fasten-import', 'importFasten')->name('fasten.import');
});

Route::resource('ajaxproducts',ProductAjaxController::class);


Route::get('/send-notification', [NotificationController::class, 'sendOrderNotification']); //notif


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
    Route::get('/pasienP/home', [App\Http\Controllers\HomeController::class, 'pasienParentHome'])->name('pasienP.home');
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



Route::middleware(['auth', 'user-access:pasienParent'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('home');
    Route::get('daftarpas', [PasienpController::class, 'daftarpas'])->name('pasienp.tambah');
    // Route::get('/daftarpas', [App\Http\Controllers\Validator\PasienpController::class, 'daftarpas'])->name('daftarpas');
    // Route::post('/registeract', [App\Http\Controllers\Validator\PasienpController::class, 'actRegister'])->name('tambahpas.pasparent');

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
    Route::get('/validator/penguna_baru', [App\Http\Controllers\Validator\ValidatorController::class, 'validatorPage'])->name('validator.validatorPage');

    Route::get('changeStatus', [App\Http\Controllers\Validator\ValidatorController::class, 'changeStatus']);

});



Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
  
Route::resource('admins', AdminsController::class,[
    'only' => ['index', 'create', 'store']
]);

  
});

