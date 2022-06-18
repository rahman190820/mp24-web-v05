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
                        {{-- <a href="{{ route('login') }}" class="active">Auth</a> --}}
                        <a class="{{ Route::is('login') ? 'active':'' }}" href="{{ route('login') }}">Login</a><a href="{{ route('register') }}" class="{{ Route::is('register') ? 'active':'' }}">Register</a>
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
                        <input placeholder="E-mail Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        {{-- <input class="form-control" type="password" name="password" placeholder="Password" required> --}}
                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
                        <span>privasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

