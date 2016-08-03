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
                {!! Form::model($discussion,['method'=>'PATCH','url'=>'/discussions/'.$discussion->id]) !!}
                    @include('forum.form')
                <div>
                    {!! Form::submit('更新文章',['class'=>'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop