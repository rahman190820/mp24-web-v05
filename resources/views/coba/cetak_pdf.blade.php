<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cetak </title>
</head>
<body>
    {{-- <img src="{{ asset('kopsurat/1.jpg') }}"  alt=""> --}}
    <h1>{{ $judul }}</h1>
    <br>
    <p>data</p>
    <p>{{ $qrcode }}</p>
    <img src="data:image/png;base64, {!! $qrcode !!}">

</body>
</html>