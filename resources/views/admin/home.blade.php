@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Member</h1>
@stop

@section('content')
<a name="" id="" class="btn btn-success float-right mb-3" href="{{ route('register') }}" role="button">Tambah Member</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama</th>
      <th scope="col">ID Member</th>
      <th scope="col">Alamat</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user as $key => $data)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $data->name }}</td>
      <td>{{ $data->id_member }}</td>
      <td>{{ $data->address }}</td>
      <td>
        <a name="" id="" class="btn btn-secondary btn-sm" href="{{ route('admin.member.detail',['id' => $data->id]) }}" role="button">
            <i class="fas fa-ellipsis-v"></i>
        </a> 
        <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('admin.member.edit',['id' => $data->id]) }}" role="button">
            <i class="fas fa-pen"></i>
        </a> 
        <a name="" id="" class="btn btn-danger btn-sm" href="{{ route('admin.member.delete',['id' => $data->id]) }}" role="button">
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