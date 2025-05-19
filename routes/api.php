<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\Api\AuthController;


Route::post('login', [AuthController::class, 'login']);

// Route untuk mengambil semua materi
Route::get('/materi', [AuthController::class, 'index']);

// Route untuk mengedit materi berdasarkan ID
Route::put('/materi/{id}', [AuthController::class, 'show']);
Route::get('/materi/cari', [AuthController::class, 'searchByTitle']);
Route::get('kuis', [AuthController::class, 'kuis']); // Menampilkan semua kuis
Route::get('kuis/{id}', [AuthController::class, 'kuisShow']); // Menampilkan kuis berdasarkan ID
