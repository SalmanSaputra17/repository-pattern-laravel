<?php

namespace App\Payments;

use App\Payments\PaymentGatewayInterface;

class CreditPaymentGateway implements PaymentGatewayInterface
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
            "credit_fee" => intval($amount - $this->discount + (($amount - $this->discount) * 0.03)),
            "currency" => $this->currency,
            "confirmation_code" => \Str::random(),
            "payment_type" => "Credit Card",
        ];
    }
}