@extends('frontend.layout')
@section('content')

<div class="test">
        <div class="container">
          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">

                </div>
          </div>
        </div>
      </div>
      <div class="ps-product--detail pt-60">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-10 col-md-12 col-lg-offset-1">
              <div class="ps-product__thumbnail">
                <div class="ps-product__image">
                  <img class="zoom" src="{{asset('/productImage/'.$product->image)}}" alt="">
                </div>
              </div>
              <div class="ps-product__info">
                <h1>{{$product->title}}</h1>
                <h3>For:{{$product->division->name}}</h3>
                <h3 class="ps-product__price">Rs{{$product->price}}</h3>
                <h2>Discount:{{$product->discount}}%</h2>
                <div class="ps-product__block ps-product__quickview">
                  <h4>DETAIL</h4>
                  <p>{!!$product->description!!}</p>
                </div>
                <div class="ps-product__block ps-product__size">
                  <h4>Quantity</h4>
                  {!!Form::open(['method'=>'POST', 'action'=>['CartController@add', $product->id], 'file'=>true])!!}
                  <div class="form-group">
                    {!!Form::number('quantity', null, ['class'=>'form-control', 'required'=>''])!!}
                  </div>
                </div>
                <div class="ps-product__shopping"><button class="ps-btn mb-10" type="submit">Add to cart<i class="ps-icon-next"></i></a>
                {!!Form::close()!!}
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>

@endsection
