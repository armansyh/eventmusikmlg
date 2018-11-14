@extends('layouts.app')

        @section('header')
            <title>Event Musik Malang</title>
        @endsection



        @section('content')
            <!-- Page Header -->
            <header class="masthead" style="background-image: url('http://medias.tourism-system.com/9/1/453694_presse.jpg')">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-10 mx-auto">
                            <div class="site-heading">
                                <h2>Selamat Datang di</h2>
                                <h1>Event Musik Malang</h1>

                                <span class="subheading">Temukan event musik favoritmu se-Malang Raya disini!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            {{--jumbotron--}}
            {{--<div class="container"><h1> </h1></div>--}}
            {{--<div class="container"><h1> </h1></div>--}}
            {{--<div class="container"><h7> </h7></div>--}}
            {{--<div class="jumbotron main-jumbotron text-center">--}}
                {{--<div class="container">--}}
                    {{--<div class="content">--}}
                        {{--<h1>Selamat Datang di Event Musik Malang</h1>--}}
                        {{--<p class="margin-bottom">Temukan event musik favoritmu se-Malang Raya disini!</p>--}}
                        {{--<p><a class="btn btn-white">Learn more</a></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

           <div class="container"><h2>Event Terbaru</h2></div>
            <div class="container">
                {{--<h1>Homepage</h1>--}}
                <div class="row">
                    <div class="col-lg-8">
                        {{--</div>--}}
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <div class="row">
                                    <div class="col-md-4">
                                        <img style="width:100%" src="/storage/img_poster/{{$post->img_poster}}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="post-preview">
                                            {{--<div class="row">--}}
                                            {{--<div class="col-md-4">--}}
                                            {{--<img style="width:100%" src="/storage/img_poster/{{$post->img_poster}}">--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-8">--}}
                                            <a href="/posts/{{$post->id}}">
                                                <h2 class="post-title">
                                                    {{$post->judul_event}}
                                                </h2>
                                                <h4 class="post-subtitle">
                                                    {{$post->tanggal}}
                                                </h4>
                                                <h5 class="post-subtitle">
                                                    {{$post->lokasi}}
                                                </h5>
                                            </a>
                                            {{--</div>--}}
                                            {{--</div>--}}

                                        </div>
                                    </div>
                                </div>




                            <hr>
                                {{--<div class="row">--}}
                                {{--<div class="col-lg-8">--}}
                                {{--<div class="bs-component">--}}
                                    {{--<div class="well">--}}
                                        {{--<h3><a href="/posts/{{$post->id}}">{{$post->judul_event}}</a></h3>--}}
                                        {{--<h5>{{$post->lokasi}}</h5>--}}

                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--</div>--}}


                                {{--</div>--}}
                            @endforeach
                        @else
                            <p>Tidak ada event</p>

                        @endif
                    </div>
                    {{--<div class="row">--}}

                    <div class="col-lg-4">


                        <div class="panel panel-success">
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
