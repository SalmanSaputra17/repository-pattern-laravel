<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerOrders\CustomerOrder;
use App\Payments\PaymentGatewayInterface;

class PaymentController extends Controller
{
    public function payOrder(CustomerOrder $order, PaymentGatewayInterface $paymentGateway)
    {
        $order->all();
        $response = $paymentGateway->charge(100000);

        return json_encode($response);
    }
}
