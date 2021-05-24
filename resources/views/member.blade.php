@extends('app')

@section('style')
<style>
    @media print {
        body {-webkit-print-color-adjust: exact;}
        nav {display: none;}
        #btn-print {display: none;}
    }

    #print .card-header {
        background-color: #f08101 !important;
    }
</style>
@endsection

@section('content')
    <div class="container" id="print">
        <div class="col-md-8 mt-5 mx-auto">
            <div class="card border-dark">
                <div class="card-header text-light">
                    <h3>Kartu Member Cahaya Fitnes Center</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-4">
                                    <p>Nama</p>
                                </div>
                                <div class="col-8">: {{ Auth::user()->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p>Username</p>
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
                        <div class="col-3">
                            @if(Auth::user()->photo==null)
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png">
                            @else
                            <div class="h-100" style="background: url('{{ asset('assets/profile') }}/{{ Auth::user()->photo }}'); background-repeat:no-repeat; background-position: center; background-size: cover;"></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-8 mt-3 mx-auto">
            <a href="#" class="btn btn-primary" id="btn-print" onclick="printcard();">Print</a>
        </div>
    </div>
@endsection

@section('script')
<script>
    function printcard(){
        window.print();
    }
</script>
@endsection