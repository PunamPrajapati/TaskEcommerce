@extends('backend/admin')
@section('content')

<div class="row">
    <div class="box">
        <div class="box-header">
              <h2 class="box-title"><i class="fa fa-cart"></i>List Of Products On Cart</h2>
            </div>
            <div id="table" class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.N.</th>
                  <th>Customer Name</th>
                  <th>Product</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($carts as $cart)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$cart->user->name}}</td>
                  <td>{{$cart->product->title}}</td>
                  <td><img src="{{asset('/productImage/'. $cart->product->image)}}" alt="" height="50px"></td>
                  <td>{{$cart->price}}</td>
                  <td>{{$cart->discount}}%</td>
                  <td>{{$cart->quantity}}</td>
                  <td>Rs{{$cart->totalPrice}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N.</th>
                  <th>Customer Name</th>
                  <th>Product</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>
@endsection
