<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhonePeController;
use Illuminate\Support\Facades\Route;
use Milon\Barcode\Facades\DNS2D;
use App\Models\User;
use App\Http\Controllers\PaymentController;


Route::get('create', function () {
    return view('index');
})->name('create-form');

Route::get('/',[HomeController::class,'show'])->name('show');
Route::post('create',[HomeController::class,'create'])->name('create');
Route::get('/generate-qr-code/{id}', [HomeController::class, 'generateQrCode']);



//PAYMENT FORM
Route::get('payment', [PaymentController::class, 'index'])->name('payment');

//SUBMIT PAYMENT FORM ROUTE
Route::post('pay-now', [PaymentController::class, 'submitPaymentForm'])->name('pay-now');

//CALLBACK ROUTE
Route::get('confirm', [PaymentController::class, 'confirmPayment'])->name('confirm');





// integrate Phone Pe

Route::get('phonepe',[PhonePeController::class,'phonepe']);
Route::get('phonepe-response',[PhonePeController::class,'response'])->name('response');



