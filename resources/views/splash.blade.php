@extends('layout.layout')

@section('content')
    <div class="position-relative d-flex flex-column justify-content-center align-items-center" style="height: 100vh; background-color: #D0DBBF;">
        <div class="text-center mb-4">
            <img src="{{ asset('/storage/logo.png') }}" alt="logo" class="logo w-50">
            <h3 class="tagline mt-6">"Recycle, Reimagine, Recraftify!"</h3>
        </div>
        <div class="text-center">
            <a href="{{ route('login') }}"><button class="text-white buttons text-center">Get Started <i class="fa-solid fa-circle-chevron-right" style="color: #D0DBBF;"></i></button></a>
        </div>
    </div>
@endsection
