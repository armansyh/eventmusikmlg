@extends('layouts.app')
@section('header')
    <title>Pencarian Event</title>
@endsection
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('http://medias.tourism-system.com/9/1/453694_presse.jpg'); height: 150px; padding: 0">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-heading" style="padding: 70px">
                        {{--<h1 class="">Tambah Event</h1>--}}
                        @if($filter == 'judul')
                            <h2 class="subheading">Hasil Pencarian dengan judul event "{{$keyword}}"</h2>
                        @elseif($filter == 'lokasi')
                            <h2 class="subheading">Hasil Pencarian dengan lokasi event "{{$keyword}}"</h2>
                        @endif
                        {{--<h2 class="subheading">Problems look mighty small from 150 miles up</h2>--}}
                        {{--<span class="meta">Dipost oleh {{$post->user_id}} pada {{$post->created_at}}</span>--}}
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container"><h1></h1></div>
    <div class="container"><h1></h1></div>
    <div class="container"><h1></h1></div>
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
                        {{--</div>--}}
                    @endforeach
                @else
                    <p>Maaf, event tidak ditemukan</p>

                @endif
            </div>
            {{--<div class="row">--}}

            <div class="col-lg-4 col-lg-offset-0">


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
