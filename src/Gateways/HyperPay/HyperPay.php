<?php

namespace Payment\Gateways\HyperPay;

use Payment\Contracts\Payment;

abstract class HyperPay implements Payment
{
    protected $amount;
    protected $user;
    protected $type;

    /**
     * @param $user
     * @param $amount
     */
    public function __construct($amount, $user)
    {
        $this->amount = round($amount);
        $this->user = $user;
    }
}
