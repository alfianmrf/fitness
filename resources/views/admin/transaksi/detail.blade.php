@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Data Transaksi</h1>
@stop

@section('content')
<a name="" id="" class="btn btn-success float-right mb-3" href="{{ route('admin.transaksi.add') }}" role="button">Tambah Transaksi</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">ID Member</th>
      <th scope="col">Nama</th>
      <th scope="col">Total Pembayaran</th>
      <th scope="col">Jenis Pembayaran</th>
      <th scope="col">Verifikasi</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($transaction as $key => $data)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $data->id_member }}</td>
      <td>{{ $data->name_member }}</td>
      <td>Rp. {{ $data->total }}</td>
      <td>{{ $data->type == 'registration' ? 'Pendaftaran' : 'Perpanjangan' }}</td>
      <td>{{ $data->verification == 1 ? 'Ya' : 'Tidak' }}</td>
      <td>
        <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('admin.transaksi.edit',['id' => $data->id]) }}" role="button">
            <i class="fas fa-pen"></i>
        </a> 
        <a name="" id="" class="btn btn-danger btn-sm" href="{{ route('admin.transaksi.delete',['id' => $data->id]) }}" role="button">
            <i class="fas fa-trash-alt"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop