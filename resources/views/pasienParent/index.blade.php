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
            <li class="breadcrumb-item"><a href="index.html">Halaman Pasien</a>
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
                       selamat datang <i>{{ auth()->user()->nama }}</i>
                  </p>
                  <br>
                  @php
                  if (auth()->user()->stts_approval == 'Y') {
                  @endphp
                  <a class="btn waves-effect waves-light cyan modal-trigger" href="#m_diagnosa">Tambah Keluhan  <i class="material-icons right">send</i></a>
                  @php
                  }
                  @endphp
              
                  <a class="btn waves-effect waves-light cyan modal-trigger" href="#m_kk">lengkapi data keluarga<i class="material-icons right">assignment</i></a>
              </div>
          </div>
      </div>

        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">
                        Keluhan
                    </h4>
                    <table  class="display data-table">
                        <thead>
                            <th>ID</th>
                            <th>nama pasien</th>
                            <th>dokter</th>
                            <th>action</th>
                        </thead>
                    </table>
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
      <h4>Formulir Keluhan</h4>
      <hr>
      <form id="keluhanForm" action="#" method="post" enctype="multipart/form-data">
          @csrf
          <div class="input-field">
            <select name="dokter_id" id="dokter_id">
              @foreach ($datas['fasten'] as $item)
                  <option value="{{ $item->id }}">{{ $item->fastenmedis }}</option>
              @endforeach
            </select>
          </div>
          <div class="input-field">
          <label for="keluhan">Keluhan</label>
          <input class="validate" type="text" name="keluhan" id="keluhan">
          </div>
      <button id="saveBtn"   class="modal-action modal-close waves-effect waves-green btn-flat">Setuju</button>
         
      </form>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green">apply</a>
  </div>
</div>


<!-- Modal Structure -->
<div id="m_kk" class="modal">
    <div class="modal-content">
        <h4>Daftar Keluarga</h4>
        <hr>
        <table  class="display data-table-user">
          <thead>
              <th>ID</th>
              <th>nama</th>
              <th>email</th>
              <th>action</th>
          </thead>
      </table>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">tutup</a>
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
    
    // alert("selamat");

    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('pasienP.home') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama pasien'},
            {data: 'fastenmedis', name: 'dokter'},
            {data: 'aksi', name: 'action', orderable: false, searchable: false},
        ]
    });

    var table_user = $('.data-table-user').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('pasienP.home.user') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'email'},
            {data: 'aksi', name: 'action', orderable: false, searchable: false},
        ]
    });
    
    $('.modal').modal({
            dismissible: false,
            opacity: .12,
            endingTop: '15%',
           
    });

    $('body').on('click', '.editProduct', function () {
        var product_id = $(this).data('id');
        $.get("{{ route('ajaxproducts.index') }}" +'/' + product_id +'/edit', function (data) {
            $('#ajaxModel').modal('show');
            $('#product_id').val(data.id);
        })
    });

    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        // $(this).html('Sending..');
        // alert($('#keluhanForm').serialize());
        $.ajax({
            data: $('#keluhanForm').serialize(),
            url: "{{ route('formulir_data') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
              alert('bershasil');
               
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });

    


  });

  </script>

  <script type="text/javascript" >
   

      // $('#saveBtn').click(function (e) {
      //   e.preventDefault();
       
      // });

  </script>
    
@endpush

@endsection