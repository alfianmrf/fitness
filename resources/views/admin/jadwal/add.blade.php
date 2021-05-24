@extends('adminlte::page')

@section('title', 'Tambah Jadwal')

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
    <div class="col-sm-3">
      <input type="time" class="form-control" name="time" value="">
    </div>
    <div class="col-sm-1 col-form-label">
      <center>s/d</center>
    </div>
    <div class="col-sm-3">
      <input type="time" class="form-control" name="end" value="">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Libur</label>
    <div class="col-sm-10">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="close" id="close1" value="1">
        <label class="form-check-label" for="close1">
          Ya
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="close" id="close2" value="0">
        <label class="form-check-label" for="close2">
          Tidak
        </label>
      </div>
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