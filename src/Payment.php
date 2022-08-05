<?php

namespace Payment;

use Payment\Contracts\Payment as PaymentContract;
use Payment\Gateways\HyperPay\PaymentValidator;

class Payment
{
    public static function getCheckoutId(PaymentContract $payment)
    {
        return $payment->getCheckoutId();
    }

    public static function checkoutStatus($id, $resource_path, $type)
    {
        return (new PaymentValidator($id, $resource_path, $type))::checkoutStatus();
    }
}
