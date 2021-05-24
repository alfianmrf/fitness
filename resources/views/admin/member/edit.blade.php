@extends('adminlte::page')

@section('title', 'Edit Member')

@section('content_header')
    <h1>Edit Member</h1>
@stop

@section('content')
<form action="{{route('admin.member.update',['id'=>$member->id])}}" method="post">
  @csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ $member->name }}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Username" name="id_member" value="{{ $member->id_member }}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Alamat" name="address" value="{{ $member->address }}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-10">
      <div class="d-block">
          <input type="radio" name="gender" value="P" id="r1" {{ isset($member->gender) &&  $member->gender == 'P' ? 'checked' : '' }}><p class="d-inline mx-3">Perempuan</p>
          <input type="radio" name="gender" value="L" id="r2" {{ isset($member->gender) &&  $member->gender == 'L' ? 'checked' : '' }}><p class="d-inline mx-3">Laki-laki</p>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Pekerjaan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Pekerjaan" name="job" value="{{ $member->job }}">
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