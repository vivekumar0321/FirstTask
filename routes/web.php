<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Milon\Barcode\Facades\DNS2D;
use App\Models\User;

Route::get('create', function () {
    return view('index');
})->name('create-form');

Route::get('/',[HomeController::class,'show'])->name('show');
Route::post('create',[HomeController::class,'create'])->name('create');
Route::get('/generate-qr-code/{id}', [HomeController::class, 'generateQrCode']);
