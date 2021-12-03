<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TambahController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\HapusController;

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

// Simple GET
Route::get('/', [IndexController::class, 'index']);
Route::get('/crud', [IndexController::class, 'crud']);
Route::get('/crudAjax', [IndexController::class, 'crudAjax']);

// Jquery GET
Route::get('/list_data', [IndexController::class, 'getListData']);
Route::get('/detail', [IndexController::class, 'getDetailData']);

// Simple POST
Route::post('{id}/edit', [EditController::class, 'simpleEdit']);
Route::post('/tambah', [TambahController::class, 'simpleTambah']);
// Simple DELETE
Route::delete('{id}/hapus', [HapusController::class, 'simpleHapus']);

// Jquery POST
Route::post('/tambah_ajax', [TambahController::class, 'ajaxTambah']);
Route::post('/updateDetailData', [EditController::class, 'updateDetailData']);
Route::post('hapus_data', [HapusController::class, 'ajaxhapus']);



