<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
use App\Http\Controllers\Administrator\AdministratorController;
use App\Http\Controllers\Person\PersonController;
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
Route::get('halaman3d',[PasienpController::class,'visual'])->name('visual');
Route::get('HalamanAdmin',[AdminsController::class,'adminPage'])->name('validator_admin');
Route::get('/HalamanAdminstrator',[AdministratorController::class,'administratorPage'])->name('validator_administrator');
Route::get('changeStatusAdmin', [AdminsController::class, 'changeStatus']);
Route::get('changeStatusAdministrator', [AdministratorController::class, 'changeStatus']);

Route::post('/update-profil/{id}', [PersonController::class,'update'])->name('update-profil');

Route::get('/profil',[PersonController::class,'index'])->name('profile_user');

Route::resource('admins', AdminsController::class,[
    'only' => ['index', 'create', 'store']
]);

Route::resource('person', PersonController::class);
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
  
    Route::get('/home', [HomeController::class, 'pasienParentHome'])->name('home');
    Route::get('/pasienP/home', [HomeController::class, 'pasienParentHome'])->name('pasienP.home');
    Route::get('/tambahChild',[PasienpController::class,'tambahParent'])->name('tambahChild');
    Route::get('/list/turunan',[PasienpController::class,'dataParent'])->name('lihatChild');

    Route::get('/riwayat/manfaat',[PasienpController::class,'tambahManfaat'])->name('manfaat');
    Route::get('/riwayat/diagnosa',[PasienpController::class,'tambahDiagnosa'])->name('diagnosa');
    Route::get('/riwayat/apotik',[PasienpController::class,'tambahApotik'])->name('apotik');
    Route::get('/riwayat/tagihan',[PasienpController::class,'tambahTagihan'])->name('tagihan');

});

Route::middleware(['auth', 'user-access:pasienChild'])->group(function () {
    Route::get('/pasienC/home', [HomeController::class, 'pasienChildHome'])->name('pasienC.home');
});

Route::middleware(['auth', 'user-access:dokter'])->group(function () {
  
    // Route::get('/dokter/home', [HomeController::class, 'dokterHome'])->name('dokter.home');
    Route::get('/dokter/home', [HomeController::class, 'dokterHome'])->name('dokter.home');
});

Route::middleware(['auth', 'user-access:apotik'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
  
    Route::get('/apotik/home', [HomeController::class, 'apotikHome'])->name('apotik.home');
});


Route::middleware(['auth', 'user-access:lab'])->group(function () {
  
    Route::get('/lab/home', [HomeController::class, 'labHome'])->name('lab.home');
});



// Route::middleware(['auth', 'user-access:pasienParent'])->group(function () {
//     Route::get('/home', [HomeController::class, 'adminHome'])->name('home');
//     Route::get('daftarpas', [PasienpController::class, 'daftarpas'])->name('pasienp.tambah');
//     // Route::get('/daftarpas', [App\Http\Controllers\Validator\PasienpController::class, 'daftarpas'])->name('daftarpas');
//     // Route::post('/registeract', [App\Http\Controllers\Validator\PasienpController::class, 'actRegister'])->name('tambahpas.pasparent');

//     // Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
// });


Route::middleware(['auth', 'user-access:support'])->group(function () {
  
    Route::get('/support/home', [HomeController::class, 'supportHome'])->name('support.home');
});


Route::middleware(['auth', 'user-access:manejemen'])->group(function () {
  
    Route::get('/manej/home', [HomeController::class, 'manejHome'])->name('manej.home');
});



Route::middleware(['auth', 'user-access:validator'])->group(function () {
  
    // Route::get('/validator/home', [HomeController::class, 'validatorHome'])->name('validator.home');
    Route::get('/validator/home', [HomeController::class, 'validatorHome'])->name('validator.home');

    Route::get('/validator/penguna_baru', [App\Http\Controllers\Validator\ValidatorController::class, 'validatorPage'])->name('validator.validatorPage');
    Route::get('changeStatus', [App\Http\Controllers\Validator\ValidatorController::class, 'changeStatus']);

});



Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('admins', AdminsController::class,[
        'only' => ['index', 'create', 'store']
    ]);
    Route::get('/HalamanAdmin',[AdminsController::class,'adminPage'])->name('validator_admin');
});



Route::middleware(['auth', 'user-access:administrator'])->group(function () {
    Route::get('/administrator/home', [HomeController::class, 'administratorHome'])->name('administrator.home');
    Route::get('/HalamanAdministrator',[AdministratorController::class,'administratorPage'])->name('validator_administrator');

});


Route::middleware(['auth', 'user-access:klinik'])->group(function () {
    Route::get('/klinik/home', [HomeController::class, 'klinikHome'])->name('klinik.home');
});

