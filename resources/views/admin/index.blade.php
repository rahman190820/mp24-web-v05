@extends('layouts.apps')
@section('konten')
 <!-- BEGIN: VENDOR CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/select.dataTables.min.css') }}">
 <!-- END: VENDOR CSS-->


<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title">Scroll - vertical And Horizontal
          </h4>
          <div class="row">
            <div class="col s12">
              <table id="scroll-vert-hor" class="display nowrap">
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


 <!-- BEGIN PAGE VENDOR JS-->
 <script src="{{ asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('app-assets/vendors/data-tables/js/dataTables.select.min.js') }}"></script>
 <!-- END PAGE VENDOR JS-->
@endsection