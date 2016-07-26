@extends('app');
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h2>Discussion
               <a class="btn btn-primary btn-lg pull-right" href="#" role="button">發佈 »</a>
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
                        <h4 class="media-heading">{{ $discussion->title }}</h4>
                        {{ $discussion->user->name }}
                    </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@stop