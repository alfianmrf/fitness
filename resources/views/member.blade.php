@extends('app')

@section('content')
    <div class="container" id="print">
        <div class="col-md-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Kartu Member</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p>Nama</p>
                        </div>
                        <div class="col-8">: {{ Auth::user()->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>ID member</p>
                        </div>
                        <div class="col-8">: {{ Auth::user()->id_member }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Alamat</p>
                        </div>
                        <div class="col-8">: {{ Auth::user()->address }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-8 mt-3 mx-auto">
            <a href="#" class="btn btn-primary" onclick="printcard();">Print</a>
        </div>
    </div>
@endsection

@section('script')
<script>
    function printcard(){
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endsection