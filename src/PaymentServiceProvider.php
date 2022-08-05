<?php

namespace Payment;

// use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views/payment', 'payment');

        $this->publishes([
            __DIR__ . '/../resources/views/payment' => resource_path('views/vendor/payment'),
        ]);

        $this->publishes([
            __DIR__ . '/../config/payment.php' => config_path('payment.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/../config/payment.php', 'payment'
        );

        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/alamiya'),
        ], 'public');
    }


    public function register()
    {
        $this->app->singleton(Payment::class, function () {
            return new Payment();
        });
    }
}
