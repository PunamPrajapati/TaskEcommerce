@extends('frontend.layout')
@section('content')
<div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            <div class = "row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    {{-- @if($message = Session::get('success'))
                        {!!$message!!}
                    @endif
                     @if($message = Session::get('error'))
                        {!!$message!!}
                    @endif--}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__order">
                      <header>
                        <h3>Your Order</h3>
                      </header>
                      <div class="content">
                        <table class="table ps-checkout__products">
                          <thead>
                            <tr>
                              <th class="text-uppercase">Product</th>
                              <th class="text-uppercase">Quantity</th>
                              <th class="text-uppercase">Price</th>
                              <th class="text-uppercase">Discount</th>
                              <th class="text-uppercase">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($carts as $cart)
                            <tr>
                              <td>{{$cart->product->title}}</td>
                              <td>{{$cart->quantity}}</td>
                              <td>{{$cart->price}}</td>
                              <td>{{$cart->discount}}%</td>
                              <td>Rs{{$cart->totalPrice}}</td>

                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <h3>Total Price: <span>
                            <?php
                            $sum = 0;
                                foreach($carts as $cart){
                                $sum = $sum + $cart->totalPrice;
                                }
                            ?>
                            {{$sum}}
                            </span></h3>
                      </div>
                    </div>
                  </div>
                </div>
            <a class="ps-btn" href="{{url('/payWithPaypal')}}">Pay With Paypal<i class="ps-icon-next"></i></a>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
            {!!Form::model($shippment, ['method'=>'DELETE', 'action'=>['CheckoutController@cancel', $shippment->id], 'file'=>true])!!}
            <button class="ps-btn" type="submit">Cancel</a>
            {!!Form::close()!!}
            </div>
        </div>
        </div>
@endsection
