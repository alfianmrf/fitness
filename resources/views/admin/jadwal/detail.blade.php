@extends('adminlte::page')

@section('title', 'Jadwal')

@section('content_header')
    <h1>Jadwal</h1>
@stop

@section('content')
<a name="" id="" class="btn btn-success float-right mb-3" href="{{ route('admin.jadwal.add') }}" role="button">Tambah Jadwal</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Hari</th>
      <th scope="col">Jam</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($schedules as $key => $schedule)
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $schedule->day }}</td>
      @if($schedule->close == 1)
      <td>Libur</td>
      @else
      <td>{{ $schedule->time }} - {{ $schedule->end }}</td>
      @endif
      <td>
        <a name="" id="" class="btn btn-primary btn-sm" href="{{ route('admin.jadwal.edit',['id' => $schedule->id]) }}" role="button">
            <i class="fas fa-pen"></i>
        </a> 
        <a name="" id="" class="btn btn-danger btn-sm" href="{{ route('admin.jadwal.delete',['id' => $schedule->id]) }}" role="button">
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