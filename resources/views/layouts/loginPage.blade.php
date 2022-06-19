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
 {{-- panggil --}}
 @stack('panggil_css')
 {{-- panggil --}}
</head>
<body>
    @yield('konten')
<script type="text/javascript" src="{{ asset('auth/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('auth/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('auth/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('auth/js/main.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 {{-- panggil --}}
 @stack('panggil_js')
 {{-- panggil --}}
</body>
</html>