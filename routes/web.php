<?php

use Illuminate\Support\Facades\Route;

Route::get('/payments/status/{type}', 'PaymentController@checkout_status')->name('payment.status');
Route::get('/payments/payment_success', 'PaymentController@checkout_status')->name('success');
Route::get('/payments/payment_fail', 'PaymentController@checkout_status')->name('fail');
