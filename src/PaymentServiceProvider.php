<?php
/**
 * Created by PhpStorm.
 * User: mostafa
 * Date: 09/09/2018
 * Time: 02:58 AM
 */

namespace Payment;


use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('payment', function () {
            return new Payment();
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'payment');
        $this->publishes([
            __DIR__ . '/migrations' => database_path('/migrations'),
            __DIR__ . '/views' => base_path('/resources/views/bank'),
            __DIR__ . '/config' => config_path(),
        ]);


    }
}