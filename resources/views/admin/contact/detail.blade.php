@extends('adminlte::page')

@section('title', 'Contact Us')

@section('content_header')
    <h1>Contact Us</h1>
@stop

@section('content')
<a name="" id="" class="btn btn-success float-right mb-3" href="{{ route('admin.contact.add') }}" role="button">Tambah Kontak</a>
<table class="table">
  <tbody>
    @foreach($contact as $key => $data)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $data->name }}</td>
      <td>{{ $data->content }}</td>
      <td>
        <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('admin.contact.edit',['id' => $data->id]) }}" role="button">
            <i class="fas fa-pen"></i>
        </a> 
        <a name="" id="" class="btn btn-danger btn-sm" href="{{ route('admin.contact.delete',['id' => $data->id]) }}" role="button">
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