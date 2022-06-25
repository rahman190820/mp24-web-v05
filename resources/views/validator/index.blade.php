@extends('layouts.apps')
@section('konten')

@push('panggil_home')
@endpush

 @push('panggil_css')
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/flag-icon/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/dropify/css/dropify.min.css') }}">
    <!-- END: VENDOR CSS-->

 @endpush
 
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
      <div class="card-title">test</div>
        <p>Selamat Datang Validator</p>
        <a href="#">Daftar</a>
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
      </div>
    </div>
  </div>
</div>


 
  
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Formulir</h4>
        <hr>
          <form action="#" method="post">
            <div class="input-field">
              <label for="txt_nama">nama</label>
              <input class="validate" type="text" name="txt_nama" id="txt_nama">
            </div>
            <input id="phone-code" type="text" class="">
            <label for="phone-code">Phone Code</label>
            <div class="row section">
              <div class="col s12 m4 l3">
                <p>Default version</p>
              </div>
              <div class="col s12 m8 l9">
                <input type="file" id="input-file-now" class="dropify" data-default-file="" />
              </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
      </div>
    </div>

<!-- END RIGHT SIDEBAR NAV --><!-- Intro -->
@include('v_part/awal')
<!-- / Intro -->
@push('panggil_js')
 <!-- BEGIN PAGE VENDOR JS-->
 <script src="{{ asset('app-assets/vendors/dropify/js/dropify.min.js') }}"></script>
 <!-- END PAGE VENDOR JS-->
   <!-- BEGIN PAGE VENDOR JS-->
   <script src="{{ asset('app-assets/vendors/formatter/jquery.formatter.min.js') }}"></script>
   <!-- END PAGE VENDOR JS-->
   <script>

    $(function () {
      $('#phone-code').formatter({
        'pattern': '+91 {{999}}-{{999}}-{{999}}-{{9999}}',
        'persistent': true
      });
    })

    $(document).ready(function(){
  // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
      $('.modal').modal({
        dismissible: false,
        opacity: .12,
        endingTop: '15%',
      });

      
      $('.dropify').dropify();
});
    </script> 

@endpush

@endsection