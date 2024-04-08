<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PasienController::class,'index' ]);
Route::post('/tambah', [PasienController::class,'store' ])->name('tambahdata');
