@extends('app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $information->name }}</h3>
                </div>
                <div class="card-body">
                    <img src="{{ asset('assets/information') }}/{{ $information->photo }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                    <p class="mt-3 text-justify">{{ $information->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection