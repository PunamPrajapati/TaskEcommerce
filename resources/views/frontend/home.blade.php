@extends('frontend.layout')
@section('content')
    <div class="ps-section--features-product ps-section masonry-root">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h3 class="ps-section__title" data-mask="features">- Features Products</h3>
          </div>
          <div class="ps-section__content pb-50">
            <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
              <div class="ps-masonry">
                <div class="grid-sizer"></div>
                    @foreach($products as $product)
                    <div class="grid-item kids">
                        <div class="grid-item__content-wrapper">
                            <div class="ps-shoe mb-30">
                                <div class="ps-shoe__thumbnail">
                                <img src="{{asset('/productImage/'. $product->image)}}" alt="" height="300px"><a class="ps-shoe__overlay" href="{{url('/productDetailPage', $product->id)}}"></a>
                                </div>
                                <div class="ps-shoe__content">
                                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="#">{{$product->title}}</a>
                                    <p class="ps-shoe__categories"><span class="ps-shoe__price">Rs.{{$product->price}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
