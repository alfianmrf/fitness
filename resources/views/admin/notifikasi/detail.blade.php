@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Notifikasi</h1>
@stop

@section('content')
    @if (count($notification) == 0)
        <p class="text-center font-italic h5">Tidak ada notifikasi</p>
    @else
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">ID Member</th>
                <th scope="col">Nama Member</th>
                <th scope="col">Total Pembayaran</th>
                <th scope="col">Jenis Pembayaran</th>
                <th scope="col">Foto</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notification as $key => $data)
                <form action="{{route('admin.notifikasi.verifikasi',['id'=>$data->id])}}" method="post">
                @csrf
                <tr>
                  <th scope="row">{{ $key+1 }}</th>
                  <td>{{ $data->id_member }}</td>
                  <td>{{ $data->name_member }}</td>
                  <td>Rp. {{ $data->total }}</td>
                  <td>{{ $data->type == 'registration' ? 'Pendaftaran' : 'Perpanjangan' }}</td>
                  <td><a href="{{ asset('assets/upload') }}/{{ $data->photo }}">Bukti Pembayaran</a></td>
                  <td><button type="submit" class="btn btn-success btn-sm">Verifikasi</button></td>
                </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop