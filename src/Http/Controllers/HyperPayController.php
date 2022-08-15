<?php

namespace Payment\Http\Controllers;

use Illuminate\Http\Request;
use Payment\Gateways\HyperPay\{Visa, Mada};
use Payment\Payment;

class HyperPayController extends Controller
{
    public function getCheckoutId($type, $user_id, $amount)
    {
        // $user = User::find($user_id);
        switch ($type) {
            case null:
                return view('payment::404');
                break;
            case 'visa':
                $payment_type = new Visa($amount, null);
                break;
            case 'mada':
                $payment_type = new Mada($amount, null);
                break;
        }
        $checkout_id = Payment::getCheckoutId($payment_type);
        return view('payment::index', $checkout_id);
    }

    public function checkoutStatus(Request $request)
    {
        return Payment::checkoutStatus(request('id'), request('resourcePath'), $request->type);
    }

    public function showResponse(Request $request)
    {
        return view('payment::index', ['status_code' => $request->status_code, 'description' => $request->description]);
    }
}
