@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Informasi</h1>
@stop

@section('content')
<a name="" id="" class="btn btn-success float-right mb-3" href="{{ route('admin.informasi.add') }}" role="button">Tambah Informasi</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama Informasi</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($information as $key => $info)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $info->name }}</td>
      <td>
        <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('admin.informasi.edit',['id' => $info->id]) }}" role="button">
            <i class="fas fa-pen"></i>
        </a> 
        <a name="" id="" class="btn btn-danger btn-sm" href="{{ route('admin.informasi.delete',['id' => $info->id]) }}" role="button">
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