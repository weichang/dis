@extends('app')
@section('content')
    <div class = "container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" role="main" >
                {!! Form::open(['url'=>'/users/register']) !!}
                    <div class="form-group">
                        {!! Form::label('name','Name:') !!}
                        {!! Form::text('name',null,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email','Email:') !!}
                        {!! Form::email('email',null,['class' => 'form-control']) !!}
                     </div>
                    <div class="form-group">
                        {!! Form::label('password','Password:') !!}
                        {!! Form::password('password',['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirm','Password_confirm:') !!}
                        {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
                    </div>
                     {!! Form::submit('註冊',['class'=>'btn btn-success form-control']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop