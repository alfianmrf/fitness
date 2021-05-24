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
                    @foreach($contacts as $key => $contact)
                    <div class="row">
                        <div class="col-4"><p><img src="{{ asset('assets/contact') }}/{{ $contact->logo }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" style="height: 24px;"> {{ $contact->name }}</p></div>
                        <div class="col-6"><p>: {{ $contact->content }}</p></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection