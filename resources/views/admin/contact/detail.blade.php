@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Contact Us</h1>
@stop

@section('content')
<table class="table">
  <tbody>
    <tr>
      <th scope="row">WhatsApp</th>
      <td>+62{{ $contact->content }}</td>
      <td>
        <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('admin.contact.edit') }}" role="button">
            <i class="fas fa-pen"></i>
        </a>
      </td>
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