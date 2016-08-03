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
                <div class="form-group">
                    {!! Form::label('title','標題:') !!}
                    {!! Form::text('title',null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body','內容:') !!}
                    {!! Form::textarea('body',null,['class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::submit('發表文章',['class'=>'btn btn-primary pull-right']) !!}
                </div>
             {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop