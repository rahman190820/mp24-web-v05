@extends('layouts.loginPage')


@push('panggil_css')
<link rel="stylesheet" href="{{ asset('pass/css/jquery.passwordRequirements.css') }}">
@endpush

@section('konten')

<div class="form-body" class="container-fluid">
    <div class="website-logo">
        <a href="index.html">
            <div class="logo">
                <img class="logo-size" src="images/logo-light.svg" alt="">
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <h3>Selesaikan lebih banyak hal dengan platform Loggin.</h3>
                <p>MP24<br><br>
                    mempersembahkan.</p>
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <div class="page-links">
                        <a class="{{ Route::is('login') ? 'active':'' }}" href="{{ route('login') }}">Halaman Masuk</a><a href="{{ route('register') }}" class="{{ Route::is('register') ? 'active':'' }}">Daftar</a>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- <input class="form-control" type="text" name="name" placeholder="Full Name" required> --}}
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="off" placeholder="Nama Lengkap" autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Email" >
                        <input id="password" type="password" class="form-control pr-password @error('password') is-invalid @enderror" name="password" required  placeholder="Kata sandi">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        <input id="password-confirm" type="password" class="form-control " name="password_confirmation" required  placeholder="Ulangi Kata sandi">

                       
                        <div class="form-button">
                            <button type="submit" class="ibtn">
                                {{ __('Daftar') }}
                            </button>
                            {{-- <button id="submit" type="submit" class="ibtn">Register</button> --}}
                        </div>
                    </form>
                    <div class="other-links">
                        <span>Privasi</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('panggil_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='{{asset('pass/js/lib/jquery-1.10.2.min.js')}}'>\x3C/script>")</script>
<script src="{{ asset('pass/js/jquery.passwordRequirements.min.js') }}"></script>
<script type="text/javascript" >
$(document).ready(function (){
    $(".pr-password").passwordRequirements();
});
@endpush

@endsection