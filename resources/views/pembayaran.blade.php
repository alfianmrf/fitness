@extends('app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Pembayaran</h3>
                </div>
                <div class="card-body">
                @if (count($payment) == 0)
                    <p class="text-center font-italic h5">Anda tidak memiliki tanggungan pembayaran</p>
                @else
                    <p>Rekening Bank a/n Fitness</p>
                    <p>Nomor Account : 1234567890</p>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Total Pembayaran</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payment as $key => $data)
                            <form action="{{route('pembayaran.upload',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div style="height:0px;overflow:hidden">
                                <input type="file" accept="image/*" id="fileInput" name="photo" />
                            </div>
                            <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>Rp. {{ $data->total }}</td>
                            <td>{{ $data->type == 'registration' ? 'Pendaftaran' : 'Perpanjangan' }}</td>
                            <td>
                                @if($data->photo==null)
                                <a name="" id="" class="btn btn-primary btn-sm" onclick="chooseFile();" href="#" role="button">
                                    Upload Bukti Pembayaran
                                </a>
                                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                                @else
                                <a href="{{ asset('assets/upload') }}/{{ $data->photo }}">Bukti Pembayaran</a>
                                @endif
                            </td>
                            </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
function chooseFile() {
    $("#fileInput").click();
}
</script>
@endsection