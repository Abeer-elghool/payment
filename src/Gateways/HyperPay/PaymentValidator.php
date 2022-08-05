<?php

namespace Alamiya\Payment\Gateways\HyperPay;

use Config;

class PaymentValidator
{
    protected static $id;
    protected static $resource_path;
    protected static $type;
    protected static $entity_id;
    protected static $url;
    protected static $token;
    protected static $code = [
        '000.000.000',
        '000.000.100',
        '000.100.110',
        '000.100.111',
        '000.100.112',
        '000.300.000',
        '000.300.100',
        '000.300.101',
        '000.300.102',
        '000.600.000',
        '000.200.100',
        '800.900.300',
    ];

    public function __construct($id, $resource_path, $type, $entity_id = null, $url = null)
    {
        self::$id               = $id;
        self::$resource_path    = $resource_path;
        self::$type             = $type;
        self::$entity_id        = $type == 'mada' ? Config::get("payment.hyper_pay.mada_entity_id") : Config::get("payment.hyper_pay.visa_entity_id");
        self::$url              = Config::get("payment.hyper_pay.urls.test_base_url");
        self::$token            = Config::get("payment.hyper_pay.authorization_token");
    }

    public static function checkoutStatus()
    {
        $url = self::$url . self::$resource_path;
        $url .= "?entityId=" . self::$entity_id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(self::$token));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $res = json_decode($responseData);
        if (in_array(@$res->result->code, self::$code) && isset($res->id)) {
            $link_code = route('success') . "?status_code=success&trans_id=" . $res->id . '&code=' . @$res->result->code;
            return redirect($link_code);
        } else {
            return redirect(route('fail'). "?status_code=fail&description=" . @$res->result->description . '&code=' . @$res->result->code);
        }
    }
}
