<?php

namespace Payment\Gateways\HyperPay;

use Payment\Contracts\Payment;

abstract class HyperPay implements Payment
{
    protected $amount;
    protected $user;
    protected $type;
    protected $payment_mood;

    /**
     * @param $user
     * @param $amount
     */
    public function __construct($amount, $user, $payment_mood = Config::get('payment.production_mode'))
    {
        $this->amount = round($amount);
        $this->user = $user;
        $this->payment_mood = $payment_mood == "PRODUCTION_MOOD";
    }
}
