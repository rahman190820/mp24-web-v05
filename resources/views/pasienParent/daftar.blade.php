@extends('layouts.apps')
@section('konten')

@push('panggil_css')
{{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
crossorigin=""/> --}}
  {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" /> --}}
  {{-- <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script> --}}
  
  <style>
    #peta { height: 480px; }
  
  </style>
@endpush

<div class="row">
    <div class="col s12">
    <div class="card">
        <div class="card-content">
            <h4 class="card-title">Daftar</h4>
            <form  action="{{ route('tambahpas.pasparent') }}" method="post">
                @csrf
              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                  <label for="first_name">First Name</label>
              </div>
              <div class="input-field col s6">
                  <input id="last_name" type="text" class="validate">
                  <label for="last_name">Last Name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                  <label for="disabled">Disabled</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" type="email" class="validate">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  This is an inline input field:
                  <div class="input-field inline">
                  <input id="email" type="email" class="validate">
                  <label for="email" data-error="wrong" data-success="right">Email</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </div>
            </form>
    
        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">nama <small>isi nama <span style="color:red" >*</span> </small> </h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="fn">
                        <label for="fn">Nama Lengkap</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Alamat <small>isi nama <span style="color:red" >*</span> </small> </h4>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                        <label for="icon_prefix2">Alamat</label>
                    </div>
                    {{-- <div id="map"></div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div id="peta"></div> --}}


<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Ambil Lokasi <small>isi lokasi <span style="color:red" >*</span> </small> </h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="lat" >
                        <label for="fn">Langtitude, longtitude</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Nomer Telepon <small>( Whatsapp) <span style="color:red" >*</span> </small> </h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="lat" >
                        <label for="fn">Langtitude, longtitude</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Tanggal Lahir <small>isi tanggal lahir <span style="color:red" >*</span> </small> </h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" class="datepicker">
                        <label for="fn">DOB</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Email <small>isi Email <span style="color:red" >*</span> </small> </h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" id="fn">
                        <label for="fn">Email</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Jenis <small>Pilih jenis <span style="color:red" >*</span> </small> </h4>
                <div class="row">
                    <p>
                        <label>
                            <input class="with-gap" name="group1" type="radio" />
                            <span>Pria</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input class="with-gap" name="group1" type="radio" />
                            <span>wanita</span>
                        </label>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                {{-- <h4 class="card-title">Ambil Lokasi <small>isi lokasi <span style="color:red" >*</span> </small> </h4> --}}
                <div class="row">
                    <div class="input-field col s12">
                      <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Kirim
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
       


@push('panggila_js')
{{-- 
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script> --}}
    <script type="text/javascript">
    
  $(document).ready(function(){
//     var map = L.map('map').setView([51.505, -0.09], 13);

// var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//   maxZoom: 19,
//   attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
// }).addTo(map);

// lokasi icon
// var marker = L.marker([51.5, -0.09]).addTo(map)
// 		.bindPopup('<b>Lokasi Saya</b><br />Hai.').openPopup();

//     // circle icon
//     var circle = L.circle([51.5, -0.09], {
// 		color: 'red',
// 		fillColor: '#d0e0e3',
// 		fillOpacity: 0.5,
// 		radius: 500
// 	}).addTo(map).bindPopup('Lokasi Saya.');

var map = L.map('peta').setView([51.505, -0.09], 13);

var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// lokasi icon
var marker = L.marker([51.5, -0.09]).addTo(map)
		.bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

    // circle icon
    var circle = L.circle([51.5, -0.09], {
		color: 'red',
		fillColor: '#d0e0e3',
		fillOpacity: 0.5,
		radius: 500
	}).addTo(map).bindPopup('I am a circle.');


    $('.datepicker').datepicker();
  });
    </script>


@endpush

@endsection