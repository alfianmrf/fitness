@extends('adminlte::page')

@section('title', 'Tambah Informasi')

@section('content_header')
    <h1>Tambah Informasi</h1>
@stop

@section('content')
<form action="{{route('admin.informasi.new')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Nama" name="name">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="description" placeholder="Deskripsi"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Gambar</label>
    <div class="col-sm-10">
      <input type="file" accept="image/*" class="form-control-file" name="photo">
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