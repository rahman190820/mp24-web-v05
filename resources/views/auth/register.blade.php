@extends('layouts.loginPage')
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
                        <a class="{{ Route::is('login') ? 'active':'' }}" href="{{ route('login') }}">Login</a><a href="{{ route('register') }}" class="{{ Route::is('register') ? 'active':'' }}">Register</a>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- <input class="form-control" type="text" name="name" placeholder="Full Name" required> --}}
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" placeholder="Full Name" autofocus>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail Address" >
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="ulangi password">

                       
                        <div class="form-button">
                            <button type="submit" class="ibtn">
                                {{ __('Register') }}
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
@endsection