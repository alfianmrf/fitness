@extends('adminlte::page')

@section('title', 'Edit Kontak')

@section('content_header')
    <h1>Edit Kontak</h1>
@stop

@section('content')
<form action="{{route('admin.contact.update',['id'=>$contact->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Media Sosial</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Media Sosial" name="name" value="{{ $contact->name }}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Kontak</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Kontak" name="content" value="{{ $contact->content }}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Logo</label>
    <div class="col-sm-10">
      <input type="file" accept="image/*" class="form-control-file" name="logo">
      <img width="50px" src="{{ asset('assets/contact') }}/{{ $contact->logo }}">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop