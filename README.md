# payment
This package provides simple implementation for payment gateways ("Hyper Pay" for now).

# installation
`composer require abeerelghool/payment`

or 

`composer require abeerelghool/payment --ignore-platform-reqs` if you are using laravel version less than 8

# How to use
First you have to initialize the Payment Type Class (Visa or Mada) and pass to it the amount (required) and the user model (nullable)

```php
<?php
use Payment\Gateways\HyperPay\Visa;

$visa = new Visa(float $amount, User $user);
// or
$mada = new Mada(float $amount, User $user);
``` 

now pass the Payment Type Class (Visa or Mada) to getCheckoutId method to get your checkout id

```php
<?php
use Payment\Payment;

$checkout_id = Payment::getCheckoutId($visa);
```

then you have to return a view for the user to enter his data.
fortunately this package provides a view file that you can use. if you which to overwrite it you have to publish the assets using:
`php artisan vendor:publish`

```php
<?php
return view('payment::index', $checkout_id);
```

This package has it's own routes which you can use
```php
<?php
Route::get('/checkouts/{type}/{user_id}/{amount}', [HyperPayController::class, 'getCheckoutId']);
Route::get('/payments/status/{type}', [HyperPayController::class, 'checkoutStatus'])->name('payment.status');
Route::get('/payments/payment_success', [HyperPayController::class, 'showResponse'])->name('success');
Route::get('/payments/payment_fail', [HyperPayController::class, 'showResponse'])->name('fail');
```
or you can define you own

