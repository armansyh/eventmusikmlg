@extends('layouts.app')
@section('header')
    <title>Tambah Event</title>
@endsection
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('http://medias.tourism-system.com/9/1/453694_presse.jpg'); height: 150px; padding: 0">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-heading" style="padding: 70px">
                        <h1 class="">Tambah Event</h1>
                        {{--<h2 class="subheading">Problems look mighty small from 150 miles up</h2>--}}
                        {{--<span class="meta">Dipost oleh {{$post->user_id}} pada {{$post->created_at}}</span>--}}
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="post-heading">--}}
                    {{--<div class="post-heading">--}}
                       {{----}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </header>

    {{--<div class="container"><h1>  </h1></div>--}}
    {{--<div class="container"><h1>  </h1></div>--}}
    <div class="container">
        {{--<div class="container"><h1>  </h1></div>--}}

        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('judul', 'Judul Event')}}
            {{Form::text('judul', '', ['class' => 'form-control', 'placeholder' => 'Judul Event', 'required'])}}

        </div>
        <div class="form-group">
            {{Form::label('lokasi', 'Lokasi Event')}}
            {{Form::text('lokasi', '', ['class' => 'form-control', 'placeholder' => 'Lokasi Event', 'required'])}}
        </div>
        <div class="form-group">
            {{Form::label('waktu', 'Waktu Event')}}
            {{Form::date('waktu', '', ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy - hh:mm', 'required'])}}
            {{Form::time('jam', '', ['class' => 'form-control', 'placeholder' => 'dd/mm/yyyy - hh:mm', 'required'])}}
        </div>

        <div class="form-group">
            {{Form::label('deskripsi', 'Deskripsi')}}
            {{Form::textarea('desc', '', ['class' => 'form-control', 'placeholder' => 'Detail Event', 'required'])}}
        </div>

        <div class="form-group">
            {{Form::file('img_poster')}}
        </div>
        {{Form::submit('Simpan', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
        @if(count($errors) > 0)
            @foreach($errors->all as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <h1></h1>

        {{--<script>--}}
            {{--$(function() {--}}
                {{--$( "#your_datepicker_id" ).datepicker({--}}
                    {{--// dateFormat: 'dd/mm/yyyy',--}}
                    {{--dateFormat: 'd/m/Y',--}}
                    {{--changeMonth: true,--}}
                    {{--changeYear: true});--}}
            {{--});--}}
        {{--</script>--}}
    </div>

@endsection
