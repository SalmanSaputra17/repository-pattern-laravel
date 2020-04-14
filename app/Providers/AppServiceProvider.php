<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Payments\PaymentGatewayInterface;
use App\Payments\BankPaymentGateway;
use App\Payments\CreditPaymentGateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        /**
         * bind: me-return object baru dari class yang di bind
         * singleton: tidak me-return object baru
         */

        $this->app->singleton(PaymentGatewayInterface::class, function() {
            if (request()->has('credit')) {
                return new CreditPaymentGateway('IDR');
            }

            return new BankPaymentGateway('IDR');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
