@extends('frontend.layout')
@section('content')

<div class="ps-content pt-80 pb-80">
    <div class="ps-container">
        <div class="ps-cart-listing">
            <table class="table ps-cart__table">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>All Products</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Discount</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($carts as $cart)
                <tr>
                  <td><img src="{{asset('/productImage/'.$cart->product->image)}}" alt="" height="50px"></td>
                  <td><a class="ps-product__preview" href="{{url('/productDetailPage', $cart->product_id)}}">{{$cart->product->title}}</a></td>
                  <td>Rs{{$cart->price}}</td>
                  <td>{{$cart->quantity}}</td>
                  <td>{{$cart->discount}}%</td>
                  <td>Rs{{$cart->totalPrice}}</td>
                  <td>
                    {!!Form::model($cart, ['method'=>'DELETE', 'action'=>['CartController@destroy', $cart->id], 'file'=>true])!!}
                    <button class="ps-remove" type="submit">
                    </button>
                    {!!Form::close()!!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="ps-cart__actions">
              <div class="ps-cart__total">
                <h3>Total Price: <span>
                <?php
                $sum = 0;
                    foreach($carts as $cart){
                                $sum = $sum + $cart->totalPrice;
                                }
                ?>
                {{$sum}}
                </span></h3>
                @if(count($carts)!=0)
            <a class="ps-btn" href="{{url('/checkout')}}">Checkout<i class="ps-icon-next"></i></a>
                @endif
             </div>
            </div>
        </div>
    </div>
</div>
@endsection

