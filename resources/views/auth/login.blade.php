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

                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                    {{-- {{ Session::get('error')}} --}}
                        {{ "Cek Email dan Password anda.. 😉" }}
                    </div>
                    @endif
                    @if(Session::has('error_log'))
                    <div class="alert alert-warning">
                    {{ Session::get('error_log')}}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- <input class="form-control" type="email" name="email" placeholder="E-mail Address" required> --}}
                        <input placeholder="E-mail Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        {{-- <input class="form-control" type="password" name="password" placeholder="Password" required> --}}
                        <input id="password" placeholder="Password" type="password" class="form-control pr-password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-button">
                            <button type="submit" class="ibtn">
                                {{ __('Login') }}
                            </button>
                            {{-- <button id="submit" type="submit" class="ibtn">MAsuk</button> --}}
                        </div>
                    </form>
                    <div class="other-links">
                        <ul>
                            <li>administrator@mp24.com</li>
                            <li>validator@mp24.com</li>
                            <li>dokter@mp24.com</li>
                            <li>apotik@mp24.com</li>
                            <li>pasien@mp24.com</li>
                            <li>pasienturunan@mp24.com</li>
                        </ul>
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
</script>
@endpush

@endsection

