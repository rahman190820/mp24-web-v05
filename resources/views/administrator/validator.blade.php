@extends('layouts.apps')
@section('konten')

@push('panggil_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN: VENDOR datatables-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/data-tables/css/select.dataTables.min.css') }}">
    <!-- END: VENDOR datatables-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-tables.css') }}">
    <!-- END: Page Level CSS-->
@endpush

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                <h4 class="card-title">Adminsitrator Validasi <small> Dokter, Apoteker, Validator, </small></h4>

                <div class="row">
                    <div class="col s12">
                        <table  class="display data-table">
                            <thead>
                                <th>ID</th>
                                <th>nama</th>
                                <th>email</th>
                                <th>status user</th>
                                <th>detail</th>
                            </thead>
                        </table>
                    </div>
                </div>
        
                </div>
            </div>
        </div>
        @include('v_part/kananSidebar')
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

    <script type="text/javascript">
        $(function () {
            
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('validator_administrator') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'nama', name: 'nama'},
                    {data: 'email', name: 'email'},
                    {data: 'status_user', name: 'status user'},
                    {data: 'detail', name: 'detail', orderable: false, searchable: false},
                ]
            });
            
        
            $('body').on('click','#pil',function(){
                var status = $(this).prop('checked') == true ? 'Y' : 'T'; 
                var user_id = $(this).data('id'); 
                alert(user_id);
        
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatusAdministrator',
                    data: {'status': status, 'user_id': user_id},
                    success: function(data){
                    alert(data.success)
                    }
                });
                
            });
               
        
        });
    </script>

@endpush

@endsection