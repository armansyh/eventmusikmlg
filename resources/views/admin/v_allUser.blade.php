@extends('layouts.app')
@section('header')
    <title>Daftar User</title>
@endsection
@section('content')
    <header class="masthead" style="background-image: url('http://medias.tourism-system.com/9/1/453694_presse.jpg'); height: 150px; padding: 0">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-heading" style="padding: 70px">
                        <h1 class="">Daftar User</h1>
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
                        <tr>
                            <th><a href="">user id</a></th>
                            <th>email</th>
                            <th>nama</th>
                        </tr>
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <tr>


                                    <td><a href="">{{$user->id}}</a></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <th class="pull-right">{!!Form::open(['url' => ['/deleteuser', $user->id], 'method' => 'POST'])!!}
                                        {{csrf_field()}}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Hapus User', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}</th>
                                    {{--<th class="pull-right"><a href="/posts/{{$post->id}}/edit" class="btn btn-default pull-right">Edit</a></th>--}}

                                </tr>

                                {{--</div>--}}


                                {{--</div>--}}
                            @endforeach
                        @else
                            <p>User tidak ditemukan</p>

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
