<?php

namespace Payment\Gateways\HyperPay;

use Config;

class Mada extends HyperPay
{
    protected $type = 'mada';

    public function getCheckoutId()
    {
        $data = "entityId=" . Config::get('payment.hyper_pay.mada_entity_id').
            "&amount=" . $this->amount .
            "&merchantTransactionId=" . date("Y-m-d_H-i-s") .
            "&currency=SAR" .
            "&customer.email=" . optional($this->user)->id .
            "&customer.givenName=" . optional($this->user)->fullname .
            "&customer.surname=" . optional($this->user)->phone .
            "&billing.street1=street" .
            "&billing.city=riyadh" .
            "&billing.state=riyadh" .
            "&billing.country=SA" .
            "&billing.postcode=75311" .
            "&paymentType=DB";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, Config::get('payment.hyper_pay.urls.test_checkouts_url'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            Config::get('payment.hyper_pay.authorization_token')
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->payment_mood); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $res = json_decode($responseData, true);
        return ['type' => $this->type, 'res' => $res];
    }
}
