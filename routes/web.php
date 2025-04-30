<?php

use App\Http\Controllers\ArsipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BljrController;
use App\Http\Controllers\quizController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LoginCheck;
use App\Http\Middleware\LoggedIn;
use App\Models\Arsip;

Route::get('/', function () {
    return view('admin.login');
});
Route::get('/coba', function () {
    return 'haiiii';
});
Route::get('/coba/cobasaja', function () {
    return view('cobaview');
});
Route::get('/cobacontroller', [BljrController::class, 'tampil']);
Route::get('/cobacontroller2', [BljrController::class, 'tampil2']);

Route::middleware(LoginCheck::class)->group(function () {
    Route::get('/login', [BljrController::class, 'login'])->name('loginadmin');
    Route::post('/loginproses', [BljrController::class, 'proseslogin'])->name('loginproses');
});
Route::middleware(LoggedIn::class)->group(function () {
    Route::get('/cobaadmin', [BljrController::class, 'tampiladmin'])->name('dashboardadmin');
    Route::get('/listbarang', [BljrController::class, 'listbarang'])->name('databarang');
    Route::get('/formhitung', [BljrController::class, 'fhitung'])->name('formhitung');
    Route::post('/proseshitung', [BljrController::class, 'calculate'])->name('proseshitung');
    Route::get('/formregister', [BljrController::class, 'fregister'])->name('formregister');
    Route::post('/prosesregister', [BljrController::class, 'daftar'])->name('prosesregister');
    Route::get('/listgempa', [BljrController::class, 'listgempa'])->name('datagempa');
    // Route::get('/edituser/{id}', [BljrController::class, 'editUser'])->name('useredit');
    // Route::post('/updateuser/{id}', [BljrController::class, 'updateUser'])->name('updateuser');
    // Route::delete('/userdelete/{id}', [BljrController::class, 'deleteUser'])->name('userdelete');
    Route::get('/logout', [BljrController::class, 'logout'])->name('logout');
    Route::get('/admin/dashboard', [BljrController::class, 'tampiladmin'])->name('dashboardadmin');
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/dokumencreate', [DokumenController::class, 'create'])->name('dokumen.create');
    Route::post('/dokumenstore', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::get('/dokumenedit/{id}', [DokumenController::class, 'edit'])->name('dokumen.edit');
    Route::post('/dokumenupdate/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumenhapus/{id}', [DokumenController::class, 'delete'])->name('dokumen.delete');
    Route::resource('lokasi', LokasiController::class);
    Route::resource('arsip', ArsipController::class);

    //User
    Route::get('/dataSiswa', [UserController::class, 'tampilData'])->name('dataSiswa');
    Route::get('/tambahSiswa', [UserController::class, 'tambahUser'])->name('tambahSiswa');
    Route::get('/edituser/{id}', [UserController::class, 'editUser'])->name('useredit');
    Route::post('/updateuser/{id}', [UserController::class, 'updateUser'])->name('updateuser');
    Route::delete('/userdelete/{id}', [UserController::class, 'deleteUser'])->name('userdelete');
    //materi
    Route::get('/materi', [MateriController::class, 'index'])->name('materi');
    Route::get('/tambahMateri', [MateriController::class, 'create'])->name('tambahMateri');
    // Route::get('/prosestambah', [MateriController::class, 'store'])->name('prosestambah');
    Route::post('/prosestambah', [MateriController::class, 'store'])->name('prosestambah');
    Route::get('/editMateri/{id}', [MateriController::class, 'edit'])->name('materiedit');
    Route::post('/updateMateri/{id}', [MateriController::class, 'update'])->name('updatemateri');
    Route::delete('/materidelete/{id}', [MateriController::class, 'destroy'])->name('materidelete');
    
    //kuis
    Route::get('/kuis', [quizController::class, 'index'])->name('kuis');
    Route::get('/tambahKuis', [quizController::class, 'create'])->name('tambahkuis');
    Route::post('/prosestambahkuis', [quizController::class, 'store'])->name('prosestambahkuis');
    Route::get('/editKuis/{id}', [quizController::class, 'edit'])->name('kuisedit');
    Route::post('/updateKuis/{id}', [quizController::class, 'update'])->name('updatekuis');
    Route::delete('/kuisdelete/{id}', [quizController::class, 'destroy'])->name('kuisdelete');

});
