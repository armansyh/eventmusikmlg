@extends('layouts.app')
@section('header')
    <title>{{$post->judul_event}}</title>
@endsection
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/storage/img_poster/{{$post->img_poster}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{$post->judul_event}}</h1>
                        {{--<h2 class="subheading">Problems look mighty small from 150 miles up</h2>--}}
                        <span class="meta">Dipost oleh {{$owner}} pada {{$post->created_at}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container"><h1>  </h1></div>
    <div class="container"><h1>  </h1></div>
    <div class="container"><h1></h1></div>



    <div class="container">
        @if($message != "")
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
        <h1>{{$post->judul_event}}</h1>
        <h1>   </h1>
        <div class="row">
            <div class="col-lg-8">
                <!-- Post Content -->
                <article>
                    {{--<div class="container">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-lg-8 col-md-10 mx-auto">--}}
                    <p>Lokasi : {{$post->lokasi}}</p>
                    <p>Waktu : {{$post->tanggal}} | {{$post->jam}}</p>
                    <h5>Detail Event</h5>
                    <p>{{$post->deskripsi}}</p>
                    {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </article>

                {{--<div class="bs-component">--}}
                    {{--<div class="well">--}}
                        {{--<h5> Lokasi : {{$post->lokasi}}</h5>--}}
                        {{--<h5> Waktu : {{$post->waktu}}</h5>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<h3>Detail Event</h3>--}}
                {{--<div class="bs-component">--}}
                    {{--<div class="well">--}}
                        {{--<h5> {{$post->deskripsi}}</h5>--}}

                    {{--</div>--}}
                {{--</div>--}}

                @if (Auth::guest())

                @elseif (Auth::user()->id == $post->user_id || Auth::user()->id == 1)
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit Event</a>

                    {{--{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}--}}
                    {{--{{Form::hidden('_method', 'DELETE')}}--}}
                    {{--{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}--}}

                    {{--{!! Form::close() !!}--}}
                @endif
                <h1></h1>


            </div>

            <div class="col-lg-4 col-lg-offset-0">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cari event</h3>
                    </div>
                    <div class="panel-body">
                        <p><b>Cari berdasarkan : </b></p>

                        <div class="form-group">
                            {{--<label class="control-label" for="inputDefault">Default input</label>--}}
                            <form action="{{URL::to('/search')}}" method="get" role="search">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="searchopt" id="optionsRadios1" value="judul" checked="">
                                        Judul Event
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="searchopt" id="optionsRadios2" value="lokasi">
                                        Lokasi Event
                                    </label>
                                </div>

                                <input type="text" name = "searchkey" class="form-control" id="inputDefault" placeholder="konser, pentas seni,  pameran musik..." required>
                                <div><h4> </h4></div>
                                <button type="submit" class="btn btn-success">Cari</button>

                            </form>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
