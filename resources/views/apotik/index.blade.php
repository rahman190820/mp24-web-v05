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
                            <table  class="display data-table">
                              <thead>
                                  <th>ID</th>
                                  <th>no peserta</th>
                                  <th>nama peserta</th>
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
      <h6>Resep</h6>
      <form action="{{ route('addmorePost') }}" method="POST">
        @csrf
   
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
   
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
   
        <table class="table table-bordered" id="dynamicTable">  
            <tr>
                <th>Nama Obat</th>
                <th>Jumlah</th>
                <th>aksi</th>
            </tr>
            <tr>  
                <input type="hidden" name="addmore[0][id_resep]"  class="form-control" />
                <td><input type="text" name="addmore[0][nama_obat]" placeholder="Masukan Nama Obat" class="form-control" autocomplete="off"/></td> 
               
                <td><input type="text" name="addmore[0][jumlah]" placeholder="Jumlah" class="form-control" autocomplete="off" /></td>  
                <td><button type="button" name="add" id="add" class="btn btn-success">Tambah Baris</button></td>  
            </tr>  
        </table> 
    
        <button type="submit" class="btn btn-success">Save</button>
      </form>

  </div>
  <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Tutup Layar</a>
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
            {data: 'nopeserta', name: 'no peserta'},
            {data: 'nama', name: 'nama peserta'},
            {data: 'aksi', name: 'detail', orderable: false, searchable: false},
          ]
      });

      $('.modal').modal({
        dismissible: false,
        opacity: .12,
        endingTop: '15%',
      });

      $('body').on('click', '.tampil', function () {
        var id_keluhan = $(this).data('id');
        
        $.ajax({
          url:'getobt/',
          type:'get',
          dataType:'json',
          success: function (params) {
            // alert(JSON.stringify(params));
            // alert('sukses');
            var table = $('.data-table-obt').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('apotik.home.obt') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama_obat', name: 'nama obat'},
                    {data: 'jumlah', name: 'jumlah'},
                    {data: 'aksi', name: 'detail', orderable: false, searchable: false},
                  ]
              });

          },
          error: function (params) {
            // alert(JSON.stringify(params));
          }
        });
        
        
      });

      var i = 0;
       
       $("#add").click(function(){
      
           ++i;
      
           $("#dynamicTable").append('<tr>'+
            ' <input type="text" name="addmore['+i+'][id_resep]"  class="form-control" />'+
            '<td><input type="text" name="addmore['+i+'][nama_obat]" placeholder="Masukan Nama Obat" class="form-control" autocomplete="off" /></td><td><input type="number" name="addmore['+i+'][jumlah]" placeholder="jumlah" class="form-control" autocomplete="off"/></td>'+
            '<td><button type="button" class="btn btn-danger remove-tr">Hapus</button></td>'+
            '</tr>');
       });
      
       $(document).on('click', '.remove-tr', function(){  
            $(this).parents('tr').remove();
       });  


  });
    
  </script>
    
@endpush

@endsection