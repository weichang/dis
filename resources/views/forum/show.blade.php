@extends('app');
@section('content')
    <div class="jumbotron">
        <div class="container">
            <div class="col-md-9" role="main">

                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="{{ $discussion->user->avatar }}" alt="64x64" style="width: 64px;height: 64px"/>
                            </a>

                        </div>

                        <div class="media-body">
                            <h4 class="media-heading">{{ $discussion->title }}</h4>
                            @if(Auth::check() && Auth::user()->id == $discussion->user_id )
                            <a class="btn btn-danger btn-lg pull-right" href="/discussions/{{$discussion->id}}/edit" role="button">編輯</a>
                            @endif
                            {{ $discussion->user->name }}
                        </div>

                    </div>


        </div>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                <div class="blog-post">
                    {!! $html !!}
                </div>
                @foreach($discussion->comments as $comment)
                    <div class="media" >
                        <div class="media-left" >
                            <a href="#">
                                <a href="#">
                                    <img class="media-object img-circle" src="{{ $comment->user->avatar }}" alt="64x64" style="width: 64px;height: 64px"/>
                                </a>
                            </a>

                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $comment->user->name }}</h4>
                            {{ $comment->body }}
                        </div>
                    </div>
                @endforeach
                <hr>
                @if(Auth::check())
                {!! Form::open(['url'=>'/comment']) !!}
                    {!! Form::hidden('discussion_id',$discussion->id) !!}
                    {!! Form::textarea('body',null,['class' => 'form-control']) !!}
                    {!! Form::submit('發表評論',['class'=>'btn btn-success pull-right']) !!}
                {!! Form::close() !!}
                @else
                    <a href="/users/login" class="btn btn-block btn-success">登入參與評論 </a>
                @endif
            </div>
        </div>

@stop