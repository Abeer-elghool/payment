<?php

namespace Payment\Http\Controllers;

class HyperPayController extends Controller
{
    public function getCheckoutId($type, $user_id, $amount)
    {
        // $user = User::find($user_id);
        $visa = new Visa($amount, null); 
        $checkout_id = Payment::getCheckoutId($visa);
        return view('payment::index', $checkout_id);
    }

    public function checkoutStatus(Request $request)
    {
        return Payment::checkoutStatus(request('id'), request('resourcePath'), $request->type);
    }

    public function showResponse(Request $request)
    {
        return view('payment::index',['status_code' => $request->status_code, 'description' => $request->description]);
    }
}