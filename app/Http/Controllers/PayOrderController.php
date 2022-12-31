<?php

namespace App\Http\Controllers;

use App\Order\OrderDetail;
use Illuminate\Http\Request;
use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;

class PayOrderController extends Controller
{
//    public function index(OrderDetail $orderDetail, BankPaymentGateway $paymentGateway)
//    {
//        $order=$orderDetail->all();
//        dd($paymentGateway->charge(2500));
//    }
//
    public function index(OrderDetail $orderDetail, PaymentGatewayContract $paymentGatewayContract)
    {
        $order=$orderDetail->all();
        dd($paymentGatewayContract->charge(2500));
    }
    //
}
