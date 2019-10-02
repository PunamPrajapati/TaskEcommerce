@extends('backend/admin')
@section('content')

<div class="row">
    <div class="message-success bg-success text-white hidden"> </div>
</div>

<div class="row">
    <div class="box">
            <div class="box-header">
              <h2 class="box-title"><i class="fa fa-list"></i>List Of Products</h2>
            </div>
            <!-- /.box-header -->
            <div class="col-sm-12 ml-3">
            <a href="#" data-url="{{route('products.create')}}" data-title="Create Product" class="create-modal btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
            </div>
            <div id="table" class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.N.</th>
                  <th>For</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Available Piece</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Description</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$product->division->name}}</td>
                  <td>{{$product->category->title}}</td>
                  <td>{{$product->title}}</td>
                  <td><img src="{{asset('/productImage/'. $product->image)}}" alt="" height="50px"></td>
                  <td>{{$product->available}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->discount}}%</td>
                  <td><a href="#" data-url="{{route('products.show', $product->id)}}" data-title="View Detail" class="create-modal btn btn-default btn-sm"><i class="fa fa-eye"></i></a></td>
                  <td>
                    <a href="#" class="create-modal btn btn-warning btn-sm" data-url="{{route('products.edit', $product->id)}}" data-title="Edit Product"><i class="fa fa-pencil"></i></a>
                  </td>
                  <td>
                    {!!Form::model($product, ['method'=>'DELETE', 'action'=>['ProductController@destroy', $product->id], 'files'=>true, 'class'=>'delete-sweet-modal'])!!}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    {!!Form::close()!!}
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N.</th>
                  <th>For</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Available Piece</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Description</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>
@endsection
