@extends('layouts.apps')
@section('konten')
 @push('panggil_css')
  

 @endpush
 
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
      <div class="card-title">test</div>
        <p>selamat datang pasien child</p>
        <a href="{{ route('') }}">Daftar</a>
      </div>
    </div>
  </div>
</div>


@push('panggil_js')
    
 
@endpush

@endsection