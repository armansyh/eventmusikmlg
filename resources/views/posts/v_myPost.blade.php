@extends('layouts.app')
@section('header')
    <title>Event Saya</title>
@endsection
@section('content')
    <header class="masthead" style="background-image: url('http://medias.tourism-system.com/9/1/453694_presse.jpg'); height: 150px; padding: 0">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="post-heading" style="padding: 70px">
                    <h1 class="">Event Saya</h1>
                    {{--<h2 class="subheading">Problems look mighty small from 150 miles up</h2>--}}
                    {{--<span class="meta">Dipost oleh {{$post->user_id}} pada {{$post->created_at}}</span>--}}
                </div>
            </div>
        </div>
    </div>
    </header>
    <div class="container">
        {{--<h1>Homepage</h1>--}}
        @if($message != "")
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8">
                <div class="well">
                    <table class="table table-striped">
                        <th>ID</th>
                        <th>Nama Event</th>
                        <th>Lokasi Event</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th></th>
                        <th></th>
                    @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td><a href="/posts/{{$post->id}}">{{$post->judul_event}}</a></td>
                                    <td>{{$post->lokasi}}</td>
                                    <td>{{$post->tanggal}}</td>
                                    <td>{{$post->jam}}</td>
                                    <th class="pull-right">{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Hapus', ['class' => 'btn btn-danger'])}}

                                        {!! Form::close() !!}</th>
                                    {{--<script>--}}
                                        {{--function myFunction() {--}}
                                            {{--//var txt;--}}
                                            {{--var r = confirm("Apakah anda yakin ingin menghapus event?");--}}
                                            {{--if (r == true) {--}}
                                                {{--{{'PostsController@destroy', $post->id}}--}}
                                            {{--} else {--}}
                                                {{--txt = "You pressed Cancel!";--}}
                                            {{--}--}}
                                           {{--// document.getElementById("demo").innerHTML = txt;--}}
                                        {{--}--}}
                                    {{--</script>--}}
                                    <th class="pull-right"><a href="/posts/{{$post->id}}/edit" class="btn btn-default pull-right">Edit</a></th>

                                </tr>

                                {{--</div>--}}


                                {{--</div>--}}
                            @endforeach
                        @else
                            <p>Maaf, event tidak ditemukan</p>

                        @endif

                    </table>

                </div>
                {{--</div>--}}

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
