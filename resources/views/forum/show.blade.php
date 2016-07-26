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
                            <a class="btn btn-primary btn-lg pull-right" href="#" role="button">編輯</a>
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
                    {{ $discussion->body}}
                </div>
            </div>
        </div>

@stop