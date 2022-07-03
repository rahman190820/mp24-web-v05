@extends('layouts.apps')

@push('panggil_css')
 <!-- BEGIN: VENDOR CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css') }}">
 <link rel="stylesheet" href="{{ asset('app-assets/vendors/select2/select2.min.css') }}" type="text/css">
 <link rel="stylesheet" href="{{ asset('app-assets/vendors/select2/select2-materialize.css') }}" type="text/css">
 <!-- END: VENDOR CSS-->
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
            <li class="breadcrumb-item"><a href="index.html">Halaman Dokter</a>
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
                      selamat datang {{ auth()->user()->nama }}
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
                        Diagnosa
                    </h4>
                    @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
           
                    <div class="row">
                        <div class="col s12">
                            <small>daftar</small>
                            <table  class="display data-table">
                                <thead>
                                    <th>nomer pasien</th>
                                    <th>nama pasien</th>
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
      <h4>Formulir Diagnosa</h4>
      <hr>
     
          <div class="input-field">
            <input class="validate" type="text" name="nopeserta" id="nopeserta">
          </div>

          <div class="input-field">
            <input class="validate" type="text" name="nama" id="nama">
          </div>

          <div class="input-field">
            <input class="validate" type="text" name="keluhan" id="keluhan">
          </div>
         
      
          <form id="formDiagnosa" action="#" method="post">
            @csrf
            @method('POST')
            <input type="hidden" name="idx1" id="idx1" value="{{ $datas['DataUser']->id }}" >
            <input type="hidden" name="idx" id="idx" >
          <div class="row section">
            <div class="col s12 m4 l3">
                <p>Keterangan Diagnosa</p>
            </div>
            <div class="col s12 m8 l9">
              <textarea name="diagnosa" id="diagnosa" cols="30" rows="10" required></textarea>

            </div>
            </div>

        
              <input id="updt" class="btn waves-effect waves-green" type="submit" value="Update Diagnosa">
            </form>

            <hr>
            <h4>Resep</h4>
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
                      <input type="hidden" name="addmore[0][id_resep]" value="{{ $datas['kdResep'] }}" class="form-control" />
                      <td><input type="text" name="addmore[0][nama_obat]" placeholder="Masukan Nama Obat" class="form-control" autocomplete="off"/></td> 
                     
                      <td><input type="text" name="addmore[0][jumlah]" placeholder="Jumlah" class="form-control" autocomplete="off" /></td>  
                      <td><button type="button" name="add" id="add" class="btn btn-success">Tambah Baris</button></td>  
                  </tr>  
              </table> 
          
              <button type="submit" class="btn btn-success">Save</button>
            </form>



  </div>
  <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green ">Tutup layar</a>
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
   <!-- BEGIN PAGE VENDOR JS-->
   <script src="{{ asset('app-assets/vendors/select2/select2.full.min.js') }}"></script>
   <!-- END PAGE VENDOR JS-->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function(){
    $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
    

      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('dokter.home') }}",
        columns: [
            {data: 'nopeserta', name: 'nomer pasien'},
            {data: 'nama', name: 'nama pasien'},
            {data: 'keluhan', name: 'keluhan'},
            {data: 'aksi', name: 'detail', orderable: false, searchable: false},
          ]
      });
    


          $('.modal').modal({
            dismissible: false,
            opacity: .20,
            endingTop: '15%',
          });

          $('body').on('click', '.tampil', function () {
            var nopeserta = $(this).data('nopeserta');
            var nama = $(this).data('nama');
            var keluhan = $(this).data('keluhan');
            var idx = $(this).data('id');
            $('#nopeserta').val(nopeserta);
            $('#nama').val(nama);
            $('#keluhan').val(keluhan);
            $('#idx').val(idx);

            
          });

          $('#updt').click(function (e) {
            e.preventDefault();
            var idx = $('#idx').val();
            var klh = $('#keluhan').val();
            if (klh == null) {
              alert('isi');
            } else{
              alert($('#formDiagnosa').serialize());
              $.ajax({
                // url:'update_diagnosa/',
                url:"{{ route('dokter.diagnosa')}}",
                type:'POST',
                dataType:'json',
                data:$('#formDiagnosa').serialize(),
                success: function (params) {
                  alert(JSON.stringify(params));

                  Swal.fire({
                            icon: 'danger',
                            title: 'error',
                            text: '<pre>'+JSON.stringify(params).statusText+'</pre>',
                            showConfirmButton: false,
                            timer: 1500
                          })
                },
                error: function (params) {
                  // alert(params);
                  // alert(JSON.stringify(params));
                  
                  Swal.fire({
                            icon: 'danger',
                            title: 'error',
                            text: JSON.stringify(params),
                            
                          })
                },
              });
            }


          });


      });
    
  </script>

  <script type="text/javascript" >
      var i = 0;
       
       $("#add").click(function(){
      
           ++i;
      
           $("#dynamicTable").append('<tr>'+
            ' <input type="text" name="addmore['+i+'][id_resep]" value="{{ $datas['kdResep'] }}" class="form-control" />'+
            '<td><input type="text" name="addmore['+i+'][nama_obat]" placeholder="Masukan Nama Obat" class="form-control" autocomplete="off" /></td><td><input type="number" name="addmore['+i+'][jumlah]" placeholder="jumlah" class="form-control" autocomplete="off"/></td>'+
            '<td><button type="button" class="btn btn-danger remove-tr">Hapus</button></td>'+
            '</tr>');
       });
      
       $(document).on('click', '.remove-tr', function(){  
            $(this).parents('tr').remove();
       });  
  </script>
    
@endpush

@endsection