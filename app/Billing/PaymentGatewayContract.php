<?php

namespace App\Billing;

interface PaymentGatewayContract
{
    public function setDiscount($amount): void;


    public function charge($amount): array;
}