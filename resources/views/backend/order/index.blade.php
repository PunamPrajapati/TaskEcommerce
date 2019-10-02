@extends('backend/admin')
@section('content')

<div class="row">
    <div class="box">
        <div class="box-header">
              <h2 class="box-title"><i class="fa fa-cart"></i>List Of Orders</h2>
            </div>
            <div id="table" class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.N.</th>
                  <th>Customer Name</th>
                  <th>Shippment Detail</th>
                  <th>Product Detail</th>
                  <th>Status</th>
                  <th>Order Created At</th>
                  <th>Delivered</th>
                  <th>Delivered Time</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$order->user->name}}</td>
                  <td><a href="#" data-url="{{url('/orderShippmentDetail', $order->id)}}" data-title="View Shippment Detail" class="create-modal btn btn-default btn-sm"><i class="fa fa-eye"></i></a></td>
                  <td><a href="#" data-url="{{url('/orderCartDetail', $order->id)}}" data-title="View Cart Detail" class="create-modal btn btn-default btn-sm"><i class="fa fa-eye"></i></a></td>
                  <td>{{$order->status}}</td>
                  <td>{{$order->created_at->diffforHumans()}}</td>
                  <td>
                      @if($order->status == "pending")
                        {!!Form::model($order, ['method'=>'PATCH', 'action'=>['OrderController@delivered', $order->id], 'files'=>true, 'class'=>'accept-sweet-modal'])!!}
                        <button type="submit" class="btn btn-success btn-sm">Delivered</button>
                        {!!Form::close()!!}
                        @else
                        <button type="submit" class="btn btn-success btn-sm" disabled>Delivered</button>
                        @endif
                </td>
                <td> {{$order->deliveredTime}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N.</th>
                  <th>Customer Name</th>
                  <th>Shippment Detail</th>
                  <th>Product Detail</th>
                  <th>Status</th>
                  <th>Order Created At</th>
                  <th>Delivered</th>
                  <th>Delivered Time</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>
@endsection
