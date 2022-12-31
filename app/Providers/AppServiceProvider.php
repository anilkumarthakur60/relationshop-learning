<?php

namespace App\Providers;

use App\Models\Tag;
use App\View\TagComposer;
use App\Billing\BankPaymentGateway;
use Illuminate\Support\Facades\View;
use App\Billing\CreditPaymentGateway;
use Illuminate\Support\ServiceProvider;
use App\Billing\PaymentGatewayContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //        $this->app->bind(PaymentGateway::class, function ($app) {
        //            return new PaymentGateway('usd');
        //        });

        //           $this->app->singleton(BankPaymentGateway::class, function ($app) {
        //            return new BankPaymentGateway('usd');
        //        });

        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            if (request()->has('credit')) {
                return new CreditPaymentGateway('usd');
            }

            return new BankPaymentGateway('usd');
        });
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {



    }
}
