@extends('app');
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2>Discussion
               <a class="btn btn-danger btn-lg pull-right" href="/discussions/create" role="button">發佈文章 »</a>
            </h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9" role="main">
                @foreach($discussions as $discussion)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="{{ $discussion->user->avatar }}" alt="64x64" style="width: 64px;height: 64px"/>
                            </a>
                        </div>

                    <div class="media-body">
                        <div class="media-conversation-meta">
                        <span class="media-conversation-replies">
                        <a href="/discussion/154#reply">{{ count($discussion->comments) }}</a>
                        回復
                        </span>
                        </div>
                        <h4 class="media-heading"><a href="/discussions/{{  $discussion->id }}"> {{ $discussion->title }}</a></h4>
                        {{ $discussion->user->name }}
                    </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@stop