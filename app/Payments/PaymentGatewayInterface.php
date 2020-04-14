<?php

namespace App\Payments;

interface PaymentGatewayInterface
{
    public function setDiscount($amount);

    public function charge($amount);
}