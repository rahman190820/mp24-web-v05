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

 <!-- peta -->

 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
 <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
 

 <!-- peta -->


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


        <div class="row">
          <div class="col s6">
            <div class="card">
              <div class="card-content">
                <h4 class="card-title">Peta</h4>
                <div id="map" style="width: auto; height: 200px;"></div>
              </div>
            </div>
          </div>
          <div class="col s6">
            <div class="card">
              <div class="card-content">
                <h4 class="card-title">Peta</h4>
                <div id="map2" style="width: auto; height: 200px;"></div>
              </div>
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
      <form id="keluhanForm" action="#" method="post" >
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

<!-- Modal Upload resep -->
<div id="m_storeresep" class="modal">
  <div class="modal-content">
      <h4>Upload Resep</h4>
      <hr>
      <form action="{{ route('gambar.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="form-label" for="inputImage">Image:</label>
        <input 
            type="file" 
            name="image" 
            id="inputImage"
            class="form-control @error('image') is-invalid @enderror">

        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <input type="submit" value="apply">
      </form>
    
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
  <!-- peta -->

  <!-- peta -->


<script>

  $(document).ready(function(){
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      var map = L.map('map').setView([-7.250445, 112.768845], 15);
 
 var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
     maxZoom: 19,
     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
 }).addTo(map);

//  var marker = L.marker([-7.250445, 112.768845]).addTo(map)
//      .bindPopup('<b>{{ auth()->user()->nama }}</b><br />I am a popup.').openPopup();

 var circle = L.circle([-7.250445, 112.768845], {
     color: 'red',
     fillColor: '#f03',
     fillOpacity: 0.5,
     radius: 500
 }).addTo(map).bindPopup('I am a circle.');

 function onMapClick(e) {
popup
  .setLatLng(e.latlng)
  .setContent('You clicked the map at ' + e.latlng.toString())
  .openOn(map);
}

map.on('click', onMapClick);
$(function(){
    $.ajax({
        url: "/leaflect",

        type: 'GET',

        success: function(data) {
          // alert(JSON.stringify(data));
            $.each(data, function( key, value ) {

                L.marker([value.koordinat_long, value.koordinat_lat]).addTo(map)
                    .bindPopup(''+value.fastenmedis+'<br> '+value.alamat+'.')
                    .openPopup();
            })
        },
        error: function(data) {

        }
    });
})
    
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

    $('body').on('click', '.lap', function () {
        var ids = $(this).data('id');
        alert(ids);
        // $.get("{{ route('lap.pasien') }}" +'/' + ids , function (data) {
        //     alert($data));
        // })
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
<!-- peta -->
<script type="text/javascript" >
     

  // $('#saveBtn').click(function (e) {
  //   e.preventDefault();
   
  // });
  <script>

</script>
</script>

 
 <!-- peta -->


@endpush

@endsection