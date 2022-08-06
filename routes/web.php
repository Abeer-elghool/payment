<?php

use Illuminate\Support\Facades\Route;
use Payment\Http\Controllers\HyperPayController;

/**
 * you can use these routes or you can define your's
 */
Route::get('/checkouts/{type}/{user_id}/{amount}', [HyperPayController::class, 'getCheckoutId']);
Route::get('/payments/status/{type}', [HyperPayController::class, 'checkoutStatus'])->name('payment.status');
Route::get('/payments/payment_success', [HyperPayController::class, 'showResponse'])->name('success');
Route::get('/payments/payment_fail', [HyperPayController::class, 'showResponse'])->name('fail');
