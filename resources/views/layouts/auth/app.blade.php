
@extends('layouts.app')
 
@push('styles')
     <style>
        .bg-image {
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
@endpush

@push('javascript')
     <script src="{{ asset('modulos/js/seguridad/auth/login.js') }}"></script>
@endpush
 
@section('slot')
    <div class="col-lg-8 bg-image"></div>
    <div class="col-lg-4">
        <section class="p-5">
            @yield('content')
        </section>
    </div>
@endsection