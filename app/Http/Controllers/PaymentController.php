<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\Details;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use Carbon\Carbon;
use Redirect;
use Session;

class PaymentController extends Controller
{

    private $_api_context;
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(
            new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret']
            )
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function payWithpaypal()
    {
        // $payer = new Payer();
        // $payer->setPaymentMethod('paypal');

        // $items = Cart::where('user_id', Auth::user()->id)->where('status', 'cart')->latest()->get();
        // $item_list = new ItemList();
        // $item_list->setItems(array($items));
        // $amount = 0;
        // foreach ($items as $item) {
        //     $amount += $item['totalPrice'];
        // }
        // // $amount = new Amount();
        // // $amount->setCurrency('USD')
        // //     ->setTotal($amount);
        // $transaction = new Transaction();
        // $transaction->setAmount($amount)
        //     ->setItemList($item_list)
        //     ->setDescription('Your transaction description');
        // $redirect_urls = new RedirectUrls();
        // $redirect_urls->setReturnUrl(url('/status'))
        //     /** Specify return URL **/
        //     ->setCancelUrl(url('/status'));
        // $payment = new Payment();
        // $payment->setIntent('Sale')
        //     ->setPayer($payer)
        //     ->setRedirectUrls($redirect_urls)
        //     ->setTransactions(array($transaction));
        // // return $payment;
        // // dd($payment->create($this->_api_context));
        // // exit;
        // try {
        //     $payment->create($this->_api_context);
        // } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        //     if (\Config::get('app.debug')) {
        //         \Session::put('error', 'Connection timeout');
        //         return redirect('/payWithPaypal');
        //     } else {
        //         \Session::put('error', 'Some error occur, sorry for inconvenient');
        //         return redirect('/payWithPaypal');
        //     }
        // }
        // foreach ($payment->getLinks() as $link) {
        //     if ($link->getRel() == 'approval_url') {
        //         $redirect_url = $link->getHref();
        //         break;
        //     }
        // }
        // /** add payment ID to session **/
        // Session::put('paypal_payment_id', $payment->getId());
        // if (isset($redirect_url)) {
        //     /** redirect to paypal **/
        //     // return Redirect::away($redirect_url);
        //     return redirect($redirect_url);
        // }
        // \Session::put('error', 'Unknown error occurred');
        // return redirect('/payWithPaypal');
        return redirect('/status');
    }

    public function getPaymentStatus()
    {
        return redirect('/order');
        /** Get the payment ID before session clear **/
        // $payment_id = Session::get('paypal_payment_id');
        // /** clear the session payment ID **/
        // Session::forget('paypal_payment_id');
        // if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        //     \Session::put('error', 'Payment failed');
        //     return Redirect::route('/shippment');
        // }
        // $payment = Payment::get($payment_id, $this->_api_context);
        // $execution = new PaymentExecution();
        // $execution->setPayerId(Input::get('PayerID'));
        // /**Execute the payment **/
        // $result = $payment->execute($execution, $this->_api_context);
        // if ($result->getState() == 'approved') {
        //     \Session::put('success', 'Payment success');
        //     return Redirect::route('/order');
        // }
        // \Session::put('error', 'Payment failed');
        // return Redirect::route('/shippment');
    }
}
