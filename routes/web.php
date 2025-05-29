<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\quizController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Middleware\LoginCheck;
use App\Http\Middleware\LoggedIn;

Route::get('/', function () {
    return view('admin.login');
});

Route::middleware(LoginCheck::class)->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('loginadmin');
    Route::post('/loginproses', [UserController::class, 'proseslogin'])->name('loginproses');
});
Route::middleware(LoggedIn::class)->group(function () {

    Route::post('/prosesregister', [UserController::class, 'daftar'])->name('prosesregister');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('dashboardadmin');

    //User
    Route::get('/dataSiswa', [UserController::class, 'tampilData'])->name('dataSiswa');
    Route::get('/tambahSiswa', [UserController::class, 'tambahUser'])->name('tambahSiswa');
    Route::get('/edituser/{id}', [UserController::class, 'editUser'])->name('useredit');
    Route::post('/updateuser/{id}', [UserController::class, 'updateUser'])->name('updateuser');
    Route::delete('/userdelete/{id}', [UserController::class, 'deleteUser'])->name('userdelete');

    //materi
    Route::get('/materi', [MateriController::class, 'index'])->name('materi');
    Route::get('/tambahMateri', [MateriController::class, 'create'])->name('tambahMateri');
    Route::post('/prosestambah', [MateriController::class, 'store'])->name('prosestambah');
    Route::get('/editMateri/{id}', [MateriController::class, 'edit'])->name('materiedit');
    Route::PUT('/updateMateri/{id}', [MateriController::class, 'update'])->name('updatemateri');
    Route::delete('/materidelete/{id}', [MateriController::class, 'destroy'])->name('materidelete');

    //kuis
    Route::get('/kuis', [quizController::class, 'index'])->name('kuis');
    Route::get('/tambahKuis', [quizController::class, 'create'])->name('tambahkuis');
    Route::post('/prosestambahkuis', [quizController::class, 'store'])->name('prosestambahkuis');
    Route::get('/editKuis/{id}', [quizController::class, 'edit'])->name('kuisedit');
    Route::post('/updateKuis/{id}', [quizController::class, 'update'])->name('updatekuis');
    Route::delete('/kuisdelete/{id}', [quizController::class, 'destroy'])->name('kuisdelete');

    // Hasil Kuis
    Route::get('/hasil-kuis', [quizController::class, 'hasil'])->name('hasil-kuis');
    Route::post('/hasil-kuis', [quizController::class, 'storeHasilKuis'])->name('hasil-kuis.store');

    // leaderboard
    Route::get('/leaderboard', [quizController::class, 'showLeaderboard'])->name('leaderboard');




});
