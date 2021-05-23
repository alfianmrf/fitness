@extends('adminlte::page')

@section('title', 'Member')

@section('content_header')
    <h1>Tambah Transaksi</h1>
@stop

@section('content')
<form action="{{route('admin.transaksi.new')}}" method="post">
  @csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">ID Member</label>
    <div class="col-sm-10">
      <select class="form-control" name="id_member" id="id_member">
      <option hidden>Pilih</option>
      @foreach($id_member as $key => $member)
        <option value="{{ $member->id_member }}">{{ $member->id_member }}</option>
      @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Member</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Nama" name="name" readonly id="name">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Total Pembayaran</label>
    <div class="input-group col-sm-10">
      <div class="input-group-prepend">
        <div class="input-group-text">Rp</div>
      </div>
      <input type="number" class="form-control" placeholder="Total Pembayaran" name="total">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Jenis Pembayaran</label>
    <div class="col-sm-10">
      <select class="form-control" name="type">
        <option value="registration">Pendaftaran</option>
        <option value="extend">Perpanjangan</option>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $('#id_member').on('change', function () {
            $.ajax({
                url: '{{ route('admin.store') }}',
                method: 'POST',
                data: {id_member: $(this).val()},
                success: function (response) {
                  $('#name').attr("value", response[0]['name'])
                }
            })
        });
    });
    </script>
@stop