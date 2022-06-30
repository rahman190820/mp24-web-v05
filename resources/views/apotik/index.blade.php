@extends('layouts.apps')

@push('panggil_css')
   <!-- BEGIN: VENDOR datatables-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/select.dataTables.min.css') }}">
<!-- END: VENDOR datatables-->
 <!-- BEGIN: Page Level CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-tables.css') }}">
 <!-- END: Page Level CSS-->     
@endpush

@section('konten')
<div class="row">
  <div class="content-wrapper-before gradient-45deg-indigo-blue"></div>
  <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
      <div class="row">
        <div class="col s10 m6 l6">
          <h5 class="breadcrumbs-title mt-0 mb-0"><span>Dashboard</span></h5>
          <ol class="breadcrumbs mb-0">
            <li class="breadcrumb-item"><a href="index.html">Halaman Apotik</a>
            </li>
            <li class="breadcrumb-item"><a href="#">dashboard</a>
            </li>
            
          </ol>
        </div>
      
      </div>
    </div>
  </div>
  <div class="col s12">
    <div class="container">
      <div class="section">
          <div class="card">
              <div class="card-content">
                  <p class="caption mb-0">
                      selamat datang {{ auth()->user()->name }}
                  </p>
              </div>
          </div>
      </div>

      <div class="col s12">
        <div class="container">
          <div class="section">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">
                        Resep pasien
                    </h4>
                    <div class="row">
                        <div class="col s12">
                            <small>Daftar Resep Pasien</small>
                            <a class="btn waves-effect waves-light cyan modal-trigger" href="#m_diagnosa">Tambah</a>
                            <table  class="display data-table">
                              <thead>
                                  <th>ID</th>
                                  <th>pasien</th>
                                  <th>keluhan</th>
                                  <th>detail</th>
                              </thead>
                          </table>
                        </div>
                    </div>
                    
                </div>
            </div>
          </div>
        </div>
    </div>

     @include('v_part/kananSidebar')
      
  </div>
  <div class="content-overlay"></div>
</div>
</div>

 <!-- Modal Structure -->
 <div id="m_diagnosa" class="modal">
  <div class="modal-content">
      <h4>Detail Resep</h4>
      <hr>
      <form action="{{ route('diagnosa.store') }}" method="post">
          @csrf
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
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Setuju</a>
  </div>
  </div>
@push('panggil_js')
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/data-tables/js/dataTables.select.min.js') }}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('app-assets/js/scripts/data-tables.js') }}"></script>
<!-- END PAGE LEVEL JS-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function(){

    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('apotik.home') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'pasien_id', name: 'pasien'},
            {data: 'keluhan', name: 'keluhan'},
            {data: 'aksi', name: 'detail', orderable: false, searchable: false},
          ]
      });

          $('.modal').modal({
            dismissible: false,
            opacity: .12,
            endingTop: '15%',
          });


      });
    
  </script>
    
@endpush

@endsection