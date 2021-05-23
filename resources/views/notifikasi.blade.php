@extends('app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Notifikasi</h3>
                </div>
                <div class="card-body">
                @if (count($notification) == 0)
                    <p class="text-center font-italic h5">Anda tidak memiliki notifikasi</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Total Pembayaran</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notification as $key => $data)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>Rp. {{ $data->total }}</td>
                                <td>{{ $data->type == 'registration' ? 'Pendaftaran' : 'Perpanjangan' }}</td>
                                @php
                                    if($data->verification == 1){
                                        $status = 'Selesai';
                                    }
                                    elseif($data->verification == 0 && $data->photo != null){
                                        $status = 'Menunggu Verifikasi';
                                    }
                                    else{
                                        $status = 'Belum Dibayar';
                                    }
                                @endphp
                                <td>{{ $status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection