<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SeragamController;

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
    return view('layouts.master');
});

// Data SISWA
Route::get('/koperasi-siswa', [SiswaController::class,'index']);
Route::get('/create', [SiswaController::class,'create']);
Route::post('/koperasi-siswa', [SiswaController::class,'store']);
Route::get('/show/{id}', [SiswaController::class,'show']);
Route::post('/update/{id}', [SiswaController::class,'update']);
Route::delete('/koperasi-siswa/{id}', [SiswaController::class,'destroy']);
Route::get('/koperasi-siswa/search', [SiswaController::class,'search']);
Route::get('/koperasi-siswa/sort', [SiswaController::class,'sort']);
Route::get('/koperasi-siswa/filter', [SiswaController::class,'filter']);

//Data SERAGAM
Route::get('/koperasi-seragam', [SeragamController::class,'index']);
Route::get('/create-seragam', [SeragamController::class,'create']);
Route::post('/koperasi-seragam', [SeragamController::class,'store']);
Route::get('/show-seragam/{id}', [SeragamController::class,'show']);
Route::post('/update-seragam/{id}', [SeragamController::class,'update']);
Route::delete('/koperasi-seragam/{id}', [SeragamController::class,'destroy']);
Route::get('/koperasi-seragam/search', [SeragamController::class,'search']);
Route::get('/koperasi-seragam/sort', [SeragamController::class,'sort']);




