<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificationEvent;
use App\Shippment;
use App\Order;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderCreate()
    {
        $shippment = Shippment::where('user_id', Auth::user()->id)->get()->first();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $cartItems = array($carts);
        $items = implode(" ", $cartItems);
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'shippment' => $shippment,
            'cart' => $items,
            'status' => 'pending',
            'notify' => '0'
        ]);

        $id = $order->id;
        $name = Auth::user()->name;
        $created_at = $order->created_at;
        foreach ($carts as $cart) {

            $cart->delete();
        }
        event(new NotificationEvent($id, $name, $created_at));

        return view('frontend.orderMessage');
    }

    public function orderDisplay()
    {
        $orders = Order::latest()->get();
        return view('backend.order.index', compact('orders'));
    }

    public function delivered($id)
    {
        $deliver = Order::find($id);
        $deliver->update([
            'status' => 'delivered',
            'deliveredTime' => date('Y-m-d')
        ]);

        return [
            'status' => 'success',
            'message' => 'Delivered',
            'data-url' => url('/orderBackend')
        ];
    }

    public function orderShippmentDetail($id)
    {
        $order = Order::find($id);
        return view('backend.order.orderShippmentDetail', compact('order'));
    }

    public function orderCartDetail($id)
    {
        $order = Order::find($id);
        return view('backend.order.orderCartDetail', compact('order'));
    }

    public function notify($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'notify' => '1'
        ]);
        return redirect('/orderBackend');
    }
}
