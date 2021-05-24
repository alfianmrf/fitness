@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Tambah Member</h1>
@stop

@section('content')
<div class="container">
    <div class="col-md-4 offset-md-4">
        <form action="{{ route('register') }}" method="post">
            @csrf
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something it's wrong:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for=""><strong>Nama Lengkap</strong></label>
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <label for=""><strong>Username</strong></label>
                <input type="text" name="id_member" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <label for=""><strong>Alamat</strong></label>
                <input type="text" name="address" class="form-control" placeholder="Alamat">
            </div>
            <div class="form-group">
                <label for=""><strong>Password</strong></label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for=""><strong>Konfirmasi Password</strong></label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop