{!!Form::model($product, ['method'=>'PATCH', 'action'=>['ProductController@update', $product->id], 'files'=>true, 'class'=>'form-horizontal', 'id'=>'form-post'])!!}
    {{csrf_field()}}
    <div class="modal-body">
        @include('backend.product.form')
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit">
            <span class="fa fa-edit"></span>Update Product
        </button>
        <button class="btn btn-default" type="button" data-dismiss="modal">
            <span class="fa fa-remove"></span>Close
        </button>
    </div>
{!!Form::close()!!}
