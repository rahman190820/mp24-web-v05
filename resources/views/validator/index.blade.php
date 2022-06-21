@extends('layouts.apps')
@section('konten')

@push('panggil_home')
@endpush

 @push('panggil_css')
  

 @endpush
 
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
      <div class="card-title">test</div>
        <p>Selamat Datang Validator</p>
        <a href="#">Daftar</a>
      </div>
    </div>
  </div>
</div>

<!-- END RIGHT SIDEBAR NAV --><!-- Intro -->
@include('v_part/awal')
<!-- / Intro -->
@push('panggil_js')
    
 
@endpush

@endsection