@extends('adminlte::page')

@section('title', 'Detail Member')

@section('content_header')
    <h1>Detail Member</h1>
@stop

@section('content')
<table class="table">
  <tbody>
    <tr>
      <th scope="row">Nama</th>
      <td>{{ $member->name }}</td>
    </tr>
    <tr>
      <th scope="row">Username</th>
      <td>{{ $member->id_member }}</td>
    </tr>
    <tr>
      <th scope="row">Alamat</th>
      <td>{{ $member->address }}</td>
    </tr>
    <tr>
      <th scope="row">Jenis Kelamin</th>
      <td>{{ $member->gender }}</td>
    </tr>
    <tr>
      <th scope="row">Pekerjaan</th>
      <td>{{ $member->job }}</td>
    </tr>
  </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop