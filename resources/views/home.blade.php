@extends('app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
                </div>
                <div class="card-body">
                    <h5>Jadwal</h5>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $key => $schedule)
                            <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $schedule->day }}</td>
                            <td>{{ $schedule->time }}</td>
                            @endforeach
                        </tbody>
                    </table>
                    <h5>Informasi</h5>
                    <div class="row">
                        @foreach($information as $key => $info)
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="card">
                                <img class="card-img" height="150" style="object-fit: cover;" src="{{ asset('assets/information') }}/{{ $info->photo }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $info->name }}</h4>
                                    @php
                                        $desc = strlen($info->description) > 20 ? substr($info->description, 0, 20)."..." : $info->description;
                                    @endphp
                                    <p class="card-text">{{ $desc }}</p>
                                    <a href="{{ route('informasi',['id' => $info->id]) }}" class="btn btn-info">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection