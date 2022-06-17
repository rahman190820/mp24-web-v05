<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/iofrm-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/iofrm-theme13.css') }}">

</head>
<body>
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
                            <a href="{{ route('login') }}" class="active">Auth</a>
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
<script type="text/javascript" src="{{ asset('auth/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('auth/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('auth/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('auth/js/main.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>