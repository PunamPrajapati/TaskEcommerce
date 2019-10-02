{!!Form::open(['method'=>'POST', 'action'=>'UserController@userRegister', 'files'=>true, 'class'=>'form-horizontal', 'id'=>'form-post'])!!}
    {{csrf_field()}}
    <div class="modal-body">
        <div class="form-group">
            <div class="col-sm-10">
                {!!Form::Label('name', 'Name')!!}
            </div>
            <div class="col-sm-10">
                {!!Form::text('name', null, ['class'=>'form-control', 'required' => ''])!!}
            </div>
            <div class="col-sm-10">
                {!!Form::Label('email', 'Email')!!}
            </div>
            <div class="col-sm-10">
                {!!Form::text('email', null, ['class'=>'form-control', 'required' => ''])!!}
            </div>
            <div class="col-sm-10">
                {!!Form::Label('phone', 'Phone')!!}
            </div>
            <div class="col-sm-10">
                {!!Form::text('phone', null, ['class'=>'form-control', 'required' => ''])!!}
            </div>
            <div class="col-sm-10">
                {!!Form::Label('password', 'Password')!!}
            </div>
            <div class="col-sm-10">
                {!!Form::password('password', ['class'=>'form-control', 'required' => ''])!!}
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit">
           Register
        </button>
        <button class="btn btn-default" type="button" data-dismiss="modal">
            <span class="fa fa-remove"></span>Close
        </button>
    </div>
{!!Form::close()!!}
