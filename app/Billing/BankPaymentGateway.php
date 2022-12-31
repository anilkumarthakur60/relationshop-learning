<?php

namespace App\Billing;

use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{
    public function __construct($currency)

    {
        $this->currency = $currency;
        $this->discount = 0;
    }


    public function setDiscount($amount): void
    {
        $this->discount = $amount;
    }
    public function charge($amount):array
    {
        // Charge the bank

        return [
            'amount' => $amount-$this->discount,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
        ];
    }

}