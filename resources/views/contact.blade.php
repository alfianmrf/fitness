@extends('app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Contact Us</h3>
                </div>
                <div class="card-body">
                    <p>Untuk informasi lebih lengkap silahkan menghubungi kami.</p>
                    <a name="" id="" class="btn btn-success" href="https://api.whatsapp.com/send?phone=62{{ $contact->content }}&text=Halo%20mau%20order%20gan" role="button"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                </div>
            </div>
        </div>
    </div>
@endsection