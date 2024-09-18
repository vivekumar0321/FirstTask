<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::post('index',[HomeController::class,'create'])->name('create');
Route::get('show',[HomeController::class,'show'])->name('show');


Route::get('/user/{id}/generate-qr', [HomeController::class, 'generateQrCode'])->name('user.qr');
