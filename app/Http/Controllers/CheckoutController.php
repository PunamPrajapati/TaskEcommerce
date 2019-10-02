<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Shippment;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;

class CheckoutController extends Controller
{
    // public function payWithPaypal()
    // {
    //     $provider = new ExpressCheckout;
    //     $data = [];
    //     $data['items'] = [];

    //     foreach (Cart::where('user_id', Auth::user()->id)->get() as $cart) {
    //         $itemDetail = [
    //             'name' => $cart->product->title,
    //             'qty' => $cart->quantity,
    //             'price' => $cart->price,
    //             'discount' => $cart->discount,
    //             'totalPrice' => $cart->totalPrice
    //         ];

    //         $data['items'][] = $itemDetail;
    //     }
    //     // return $data;

    //     $data['invoice_id'] = uniqid();
    //     $data['invoice_description'] = "Order";
    //     $data['return_url'] = url('/order');
    //     $data['cancel_url'] = url('/test');

    //     $total = 0;
    //     foreach ($data['items'] as $item) {
    //         $total += $item['totalPrice'];
    //     }

    //     $data['total'] = $total;
    //     // return $data;

    //     $response = $provider->setExpressCheckout($data);
    //     // This will redirect user to PayPal
    //     return redirect($response['paypal_link']);
    // }

    public function shippment(Request $request)
    {
        $input = $request->all();
        Shippment::create([
            'user_id' => Auth::user()->id,
            'name' => $input['name'],
            'address' => $input['address'],
            'city' => $input['city'],
            'phone' => $input['phone']
        ]);
        $shippment = Shippment::where('user_id', Auth::user()->id)->latest()->get()->first();
        $carts = Cart::where('user_id', Auth::user()->id)->latest()->get();
        return view('frontend.payment', compact('shippment', 'carts'));
    }

    public function cancel($id)
    {
        $shippment = Shippment::findOrFail($id)->delete();
        return redirect('/checkout');
    }
}
