@extends('adminlte::page')

@section('title', 'Detail Informasi')

@section('content_header')
    <h1>Detail Informasi</h1>
@stop

@section('content')
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10 col-form-label">
        <p class="mb-0 text-justify">{{ $information->name }}</p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Deskripsi</label>
      <div class="col-sm-10 col-form-label">
        <p class="mb-0 text-justify">{{ $information->description }}</p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Gambar</label>
      <div class="col-sm-10 col-form-label">
        <img width="200px" src="{{ asset('assets/information') }}/{{ $information->photo }}">
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop