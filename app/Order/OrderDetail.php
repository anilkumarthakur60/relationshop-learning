<?php

namespace App\Order;

use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;

class OrderDetail
{
    private  $paymentGateway;
    public function __construct(PaymentGatewayContract $paymentGateway) {
        $this->paymentGateway = $paymentGateway;
    }


    public function all()
    {
        $this->paymentGateway->setDiscount(500);
        return [
            'name' => 'Abdul',
            'address' => 'Dhaka'
        ];

    }

}