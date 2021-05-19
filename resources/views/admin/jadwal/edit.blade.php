@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Tambah Jadwal</h1>
@stop

@section('content')
<form action="{{route('admin.jadwal.update',['id'=>$schedule->id])}}" method="post">
  @csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Hari</label>
    <div class="col-sm-10">
      <select class="form-control" name="day">
        <option value="Senin" {{ $schedule->day == 'Senin' ? 'selected' : '' }}>Senin</option>
        <option value="Selasa" {{ $schedule->day == 'Selasa' ? 'selected' : '' }}>Selasa</option>
        <option value="Rabu" {{ $schedule->day == 'Rabu' ? 'selected' : '' }}>Rabu</option>
        <option value="Kamis" {{ $schedule->day == 'Kamis' ? 'selected' : '' }}>Kamis</option>
        <option value="Jumat" {{ $schedule->day == 'Jumat' ? 'selected' : '' }}>Jumat</option>
        <option value="Sabtu" {{ $schedule->day == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
        <option value="Minggu" {{ $schedule->day == 'Minggu' ? 'selected' : '' }}>Minggu</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jam</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" placeholder="Jam" name="time" value="{{ $schedule->time }}">
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