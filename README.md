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
fortunately this package provides a view file that you can use. if you wish to overwrite it you have to publish the assets using:
`php artisan vendor:publish`

```php
<?php
return view('payment::index', $checkout_id);
```
then you can check the response you get with checkoutStatus method that provided by the Payment class
```php
<?php
Payment::checkoutStatus(request('id'), request('resourcePath'), $request->type);
```
# Notes

All the routes and methods are predefined in this package you can use them or you can define your own

You can define your credentials by overwritting the config file
if you are wish to put this package to production mood you have to set the `payment_mood` to `PRODUCTION_MOOD`
```php
<?php

return [
    'hyper_pay'           => [
        'mada_entity_id'      => env('MADA_ENTITY_ID',''),
        'visa_entity_id'      => env('VISA_ENTITY_ID',''),
        'authorization_token' => env('PAYMENT_AUTHORIZATION_TOKEN',''),
        'urls'                => [
            'test_base_url'      => env('PAYMENT_URL', ''),
            'test_checkouts_url' => env('PAYMENT_URL', ''),
        ],
        'payment_mood' => env('PAYMENT_MOOD', ''), // TEST_MOOD || PRODUCTION_MOOD
    ]
];
```
