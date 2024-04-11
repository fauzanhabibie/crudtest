<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PasienController::class,'index' ]);
Route::post('/tambah', [PasienController::class,'store' ])->name('tambahdata');
Route::put('/update/{id}', [PasienController::class,'update' ])->name('pasien.update');
Route::delete('/delet-data/{id_pasien}', [PasienController::class, 'delete'])->name('pasien.delete');
