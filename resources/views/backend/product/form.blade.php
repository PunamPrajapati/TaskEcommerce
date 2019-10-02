<div class="form-group">
    <div class="col-sm-10">
        {!!Form::Label('division_id', 'For::')!!}
    </div>
    <div class="col-sm-10">
        {!!Form::select('division_id',$divisions, null, ['class'=>'form-control', 'placeholder'=>'Select Option', 'required' => ''])!!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10">
        {!!Form::Label('category_id', 'Category')!!}
    </div>
    <div class="col-sm-10">
        {!!Form::select('category_id',$categories, null, ['class'=>'form-control', 'placeholder'=>'Select Category', 'required' => ''])!!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10">
        {!!Form::Label('title', 'Title')!!}
    </div>
    <div class="col-sm-10">
        {!!Form::text('title', null, ['class'=>'form-control', 'required' => ''])!!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10">
        {!!Form::Label('image', 'Image')!!}
    </div>
    <div class="col-sm-10">
        {!!Form::file('image', null, ['class'=>'form-control', 'required' => ''])!!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10">
        {!!Form::Label('available', 'Available Piece')!!}
    </div>
    <div class="col-sm-10">
        {!!Form::number('available', null, ['class'=>'form-control', 'required' => ''])!!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10">
        {!!Form::Label('price', 'Price')!!}
    </div>
    <div class="col-sm-10">
        {!!Form::text('price', null, ['class'=>'form-control', 'required' => ''])!!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10">
        {!!Form::Label('description', 'Description')!!}
    </div>
    <div class="col-sm-10">
        {!!Form::textarea('description', null, ['class'=>'form-control', 'id'=>'tinymce', 'required' => ''])!!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-10">
        {!!Form::Label('discount', 'Discount%')!!}
    </div>
    <div class="col-sm-10">
        {!!Form::number('discount', null, ['class'=>'form-control'])!!}
    </div>
</div>
