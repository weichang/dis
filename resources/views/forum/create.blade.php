@extends('app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2" role="main">
                @if($errors->any())
                    <ul class="list-group-item">
                        @foreach($errors->all() as $error )
                            <li class="list-group-item list-group-item-danger"> {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
             {!! Form::open(['url'=>'/discussions']) !!}
               @include('forum.form')
             {!! Form::submit('發表',['class'=>'btn btn-success form-control']) !!}
             {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop