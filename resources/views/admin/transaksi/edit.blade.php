@extends('adminlte::page')

@section('title', 'Edit Transaksi')

@section('content_header')
    <h1>Edit Transaksi</h1>
@stop

@section('content')
<form action="{{route('admin.transaksi.update',['id'=>$transaction->id])}}" method="post">
  @csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Username" name="id_member" value="{{ $transaction->id_member }}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Member</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ $transaction->name_member }}" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Total Pembayaran</label>
    <div class="input-group col-sm-10">
      <div class="input-group-prepend">
        <div class="input-group-text">Rp</div>
      </div>
      <input type="number" class="form-control" placeholder="Total Pembayaran" name="total" value="{{ $transaction->total }}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jenis Pembayaran</label>
    <div class="col-sm-10">
      <select class="form-control" name="type">
        <option value="registration" {{ $transaction->type == 'registration' ? 'selected' : '' }}>Pendaftaran</option>
        <option value="extend" {{ $transaction->type == 'extend' ? 'selected' : '' }}>Perpanjangan</option>
      </select>
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