@extends('adminlte::page')

@section('title', 'Data Transaksi')

@section('content_header')
    <h1>Data Transaksi</h1>
@stop

@section('content')
<div class="row no-print">
  <div class="col-6">
    <form action="{{ url()->current() }}" method="GET" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari..." name="keyword" value="{{ request('keyword') }}">
            <span class="input-group-btn">
        </span>
        </div>
    </form>
  </div>
  <div class="col-6">
    <a name="" id="" class="btn btn-success float-right mb-3" href="{{ route('admin.transaksi.add') }}" role="button">Tambah Transaksi</a>
    <a href="#" class="btn btn-dark float-right mb-3 mr-3" id="btn-print" onclick="printcard();"><i class="fa fa-print" aria-hidden="true"></i></a>
  </div>
</div>
<h3 class="print">Data Transaksi</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Username</th>
      <th scope="col">Nama</th>
      <th scope="col">Total Pembayaran</th>
      <th scope="col">Jenis Pembayaran</th>
      <th scope="col">Verifikasi</th>
      <th scope="col" class="no-print">Action</th>
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
      <td class="no-print">
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
    <style>
        .print {display: none;}

        @media print {
            .no-print {display: none;}
            .print {display: block;}
        }
    </style>
@stop

@section('js')
    <script>
        function printcard(){
            window.print();
        }
    </script>
@stop