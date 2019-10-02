@extends('frontend.layout')
@section('content')
<div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            {!!Form::open(['method'=>'POST', 'action'=>'CheckoutController@shippment', 'class'=>'ps-checkout_form'])!!}
            <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__billing">
                      <h3>Billing Detail</h3>
                            <div class="form-group form-group--inline">
                              {!!Form::label('name', 'Name')!!}
                              {!!Form::text('name', null, ['required'=>''])!!}
                            </div>
                            <div class="form-group form-group--inline">
                              {!!Form::label('address', 'Address')!!}
                              {!!Form::text('address', null, ['required'=>''])!!}
                            </div>
                            <div class="form-group form-group--inline">
                              {!!Form::label('city', 'City')!!}
                              {!!Form::text('city', null, ['required'=>''])!!}
                            </div>
                            <div class="form-group form-group--inline">
                              {!!Form::label('phone', 'Phone')!!}
                              {!!Form::text('phone', null, ['required'=>''])!!}
                            </div>
                        <button type="submit" class="ps-btn">Proceed To Payment</button>
                    </div>
                  </div>
            </div>
          {!!Form::close()!!}
        </div>
      </div>
@endsection
