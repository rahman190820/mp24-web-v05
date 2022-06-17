@extends('layouts.apps')
@section('konten')
 @push('panggil_css')
   <!-- BEGIN: VENDOR datatables-->
 <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/select.dataTables.min.css') }}">
 <!-- END: VENDOR datatables-->
  <!-- BEGIN: Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-tables.css') }}">
  <!-- END: Page Level CSS-->

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

<style>
  #map { height: 480px; }

</style>

 @endpush
 
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
      <div class="card-title">test</div>
      <div id="map"></div>

      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title">Scroll - vertical And Horizontal
          </h4>
          <div class="row">
            <div class="col s12">
              <table id="scroll-vert-hor" class="display">
                <thead>
                  <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th>Extn.</th>
                    <th>E-mail</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th>Extn.</th>
                    <th>E-mail</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                    <td>5421</td>
                    <td>t.nixon@datatables.net</td>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                    <td>5421</td>
                    <td>t.nixon@datatables.net</td>
                  </tr>
               
                  <tr>
                    <td>Donna</td>
                    <td>Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                    <td>4226</td>
                    <td>d.snider@datatables.net</td>
                    <td>Donna</td>
                    <td>Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                    <td>4226</td>
                    <td>d.snider@datatables.net</td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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

    <script type="text/javascript" >
    var map = L.map('map').setView([51.505, -0.09], 13);

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


    </script>
@endpush

@endsection