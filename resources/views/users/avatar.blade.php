@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center"></div>
                <img src="{{ Auth::user()->avatar }}" width="120" class="img-circle" alt="">
                {!! Form::open( ['url'=>'/avatar','files'=> true]) !!}
                {!! Form::file('avatar') !!}
                {!! Form::submit('上傳頭像',['class'=>'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
