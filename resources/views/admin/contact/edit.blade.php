@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Edit Contact</h1>
@stop

@section('content')
<form action="{{route('admin.contact.update')}}" method="post">
  @csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">WhatsApp</label>
    <div class="input-group col-sm-10">
      <div class="input-group-prepend">
        <div class="input-group-text">+62</div>
      </div>
      <input type="text" class="form-control" placeholder="WhatsApp" name="content" value="{{ $contact->content }}">
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