<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\PayPal_product;

class PayPalPaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        $PayPal_product = [];
        // make ['items'] singular
        $PayPal_product['items'] = [
            [
                'name' => $request->name,
                'price' => $request->price,
                'desc'  => $request->description,
                'qty' => $request->quantity
            ]
        ];
  
        $PayPal_product['invoice_id'] = 1;
        $PayPal_product['invoice_description'] = "Order #{$PayPal_product['invoice_id']} Bill";
        $PayPal_product['return_url'] = route('success.payment');
        $PayPal_product['cancel_url'] = route('cancel.payment');
        $PayPal_product['total'] = 224;
  
        $paypalModule = new ExpressCheckout;
  
        $res = $paypalModule->setExpressCheckout($PayPal_product);
        $res = $paypalModule->setExpressCheckout($PayPal_product, true);
  
        return redirect($res['paypal_link']);
    }
   
    public function paymentCancel()
    {
      // redirect with message to the home page "Payment cancelled"
      return redirect('/a')->with('error', 'Payment cancelled.');
    }
  
    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $request = $paypalModule->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($request['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Payment was successfull. The payment success page goes here!');
        }
  
        dd('Error occured!');
    }
}