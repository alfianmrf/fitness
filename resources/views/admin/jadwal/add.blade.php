@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Tambah Jadwal</h1>
@stop

@section('content')
<form action="{{route('admin.jadwal.new')}}" method="post">
  @csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Hari</label>
    <div class="col-sm-10">
      <select class="form-control" name="day">
        <option value="Senin">Senin</option>
        <option value="Selasa">Selasa</option>
        <option value="Rabu">Rabu</option>
        <option value="Kamis">Kamis</option>
        <option value="Jumat">Jumat</option>
        <option value="Sabtu">Sabtu</option>
        <option value="Minggu">Minggu</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jam</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" placeholder="Jam" name="time" value="">
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