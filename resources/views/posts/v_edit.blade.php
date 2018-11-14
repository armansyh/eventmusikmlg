@extends('layouts.app')
@section('header')
    <title>Edit Event</title>
@endsection
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('http://medias.tourism-system.com/9/1/453694_presse.jpg'); height: 150px; padding: 0">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-heading" style="padding: 70px">
                        <h1 class="">Edit Event</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        {{--<div class="container"><h1>  </h1></div>--}}
        {{--<div class="container"><h1>  </h1></div>--}}

        {{--<h1>Edit Event</h1>--}}
        {{--<h1>   </h1>--}}


        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('judul', 'Judul Event')}}
            {{Form::text('judul', $post->judul_event, ['class' => 'form-control', 'placeholder' => 'Judul Event', 'required'])}}

        </div>
        <div class="form-group">
            {{Form::label('lokasi', 'Lokasi Event')}}
            {{Form::text('lokasi', $post->lokasi, ['class' => 'form-control', 'placeholder' => 'Lokasi Event', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('waktu', 'Waktu Event')}}
            {{Form::date('waktu', $post->tanggal, ['class' => 'form-control', 'placeholder' => 'Waktu Event', 'required'])}}
            {{Form::time('jam', $post->jam, ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy - hh:mm', 'required'])}}

        </div>
        <div class="form-group">
            {{Form::label('deskripsi', 'Deskripsi')}}
            {{Form::textarea('desc', $post->deskripsi, ['class' => 'form-control', 'placeholder' => 'Detail Event', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::file('img_poster')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Simpan', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
    <h1></h1>


@endsection
