@extends('frontend.layout')
@section('content')

<div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">

          <div class="ps-product__columns">
            @if(count($productClothes)==0)
                <h3>No Products</h3>
            @else
            @foreach($productClothes as $clothes)
            <div class="ps-product__column">
              <div class="ps-shoe mb-30">
                    <div class="ps-shoe__thumbnail">
                        <img src="{{asset('/productImage/'. $clothes->image)}}" alt="" height="300px"><a class="ps-shoe__overlay" href="{{url('/productDetailPage', $clothes->id)}}"></a>
                    </div>
                <div class="ps-shoe__content">
                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">{{$clothes->title}}</a>
                    <p class="ps-shoe__categories"> <span class="ps-shoe__price">Rs.{{$clothes->price}}</span> </p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
        <div class="ps-sidebar" data-mh="product-listing">
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3></h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li class="current"><a href="{{url('/clothesPage')}}">All</a></li>
                <li><a href="#">Men</a></li>
                <li><a href="#">Women</a></li>
                <li><a href="#">Kids</a></li>
              </ul>
            </div>
          </aside>
        </div>
      </div>

@endsection
