<?php

namespace App\CustomerOrders;

use App\Payments\PaymentGatewayInterface;

class CustomerOrder
{
    private $paymentGateway;

    public function __construct(PaymentGatewayInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $discount = $this->paymentGateway->setDiscount(2000);

        return [
            "name" => "Salman Saputra",
            "address" => "Jalan Tapos LBC No.24, Ciawi, Bogor, Jawa Barat, Indonesia"
        ];
    }
}