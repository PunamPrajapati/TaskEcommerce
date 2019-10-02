<div class="modal-body">
<h2>{{$product->title}}</h2>
<img src="{{asset('/productImage/'. $product->image)}}" alt="" height="100%" width="50%">
<p>{!!$product->description!!}</p>
</div>
<div class="modal-footer">
    <button class="btn btn-default" type="button" data-dismiss="modal">
        <span class="fa fa-remove"></span>Close
    </button>
</div>

