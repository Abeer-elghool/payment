<?php

namespace Payment\Gateways\HyperPay;

use Payment\Contracts\Payment;
use Config;

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
    public function __construct($amount, $user)
    {
        $this->amount = round($amount);
        $this->user = $user;
        $this->payment_mood = $payment_mood == "PRODUCTION_MOOD";
        $this->payment_mood = Config::get('payment.production_mode') == "PRODUCTION_MOOD";
    }
}
