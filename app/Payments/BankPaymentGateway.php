<?php

namespace App\Payments;

use App\Payments\PaymentGatewayInterface;

class BankPaymentGateway implements PaymentGatewayInterface
{
    private $currency,
        $discount;

    public function __construct($currency = 'IDR')
    {
        $this->currency = $currency;
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    public function charge($amount)
    {
        return [
            "amount" => intval($amount - $this->discount),
            "discount" => $this->discount,
            "currency" => $this->currency,
            "confirmation_code" => \Str::random(),
            "payment_type" => "Bank Transfer",
        ];
    }
}