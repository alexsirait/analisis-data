<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterDataController;
Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/masterdata', [MasterDataController::class, 'masterdata'])->name('masterdata');
Route::get('/umur', [MasterDataController::class, 'umur'])->name('umur');
Route::get('/gender', [MasterDataController::class, 'gender'])->name('gender');
Route::get('/insert', [MasterDataController::class, 'insert'])->name('insert');
Route::get('/provinsi', [MasterDataController::class, 'provinsi'])->name('provinsi');
Route::get('/pekerjaan', [MasterDataController::class, 'pekerjaan'])->name('pekerjaan');
Route::get('/wordFrequency', [MasterDataController::class, 'wordFrequency'])->name('wordFrequency');
Route::get('/jenisKepuasan', [MasterDataController::class, 'jenisKepuasan'])->name('jenisKepuasan');
Route::get('/wordCloud', [MasterDataController::class, 'wordCloud'])->name('wordCloud');
Route::get('/checkBox', [MasterDataController::class, 'checkBox'])->name('checkBox');