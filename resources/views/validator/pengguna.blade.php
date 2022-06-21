@extends('layouts.apps')
@section('konten')
@push('panggil_css')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script> --}}
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
        <h4 class="card-title">Pengguna Baru
        </h4>

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


     
<script type="text/javascript">
    $(function () {
     
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        // scrollY: true,
    // scrollX: true,
        serverSide: true,
        ajax: "{{ route('validator.validatorPage') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'email'},
            {data: 'status_user', name: 'status user'},
            {data: 'detail', name: 'detail', orderable: false, searchable: false},
        ]
    });
     
    // $('#createNewProduct').click(function () {
    //     $('#saveBtn').val("create-product");
    //     $('#product_id').val('');
    //     $('#productForm').trigger("reset");
    //     $('#modelHeading').html("Create New Product");
    //     $('#ajaxModel').modal('show');
    // });
    
    // $('body').on('click', '.editProduct', function () {
    //     var product_id = $(this).data('id');
    //     $.get("{{ route('ajaxproducts.index') }}" +'/' + product_id +'/edit', function (data) {
    //         $('#modelHeading').html("Edit Product");
    //         $('#saveBtn').val("edit-user");
    //         $('#ajaxModel').modal('show');
    //         $('#product_id').val(data.id);
    //         $('#name').val(data.name);
    //         $('#detail').val(data.detail);
    //     })
    // });
    
    // $('#saveBtn').click(function (e) {
    //     e.preventDefault();
    //     $(this).html('Sending..');
    
    //     $.ajax({
    //         data: $('#productForm').serialize(),
    //         url: "{{ route('ajaxproducts.store') }}",
    //         type: "POST",
    //         dataType: 'json',
    //         success: function (data) {
    //             $('#productForm').trigger("reset");
    //             $('#ajaxModel').modal('hide');
    //             table.draw();
    //         },
    //         error: function (data) {
    //             console.log('Error:', data);
    //             $('#saveBtn').html('Save Changes');
    //         }
    //     });
    // });

    // $('body').on('click', '.deleteProduct', function (){
    //     var product_id = $(this).data("id");
    //     var result = confirm("Are You sure want to delete !");
    //     if(result){
    //         $.ajax({
    //             type: "DELETE",
    //             url: "{{ route('ajaxproducts.store') }}"+'/'+product_id,
    //             success: function (data) {
    //                 table.draw();
    //             },
    //             error: function (data) {
    //                 console.log('Error:', data);
    //             }
    //         });
    //     }else{
    //         return false;
    //     }
    // });

    $('body').on('click','#pil',function(){
        var status = $(this).prop('checked') == true ? 'Y' : 'T'; 
        var user_id = $(this).data('id'); 
        // alert(user_id);

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              Swal.fire({
                icon: 'success',
                title: data.success,
                text: 'mp24',
                showConfirmButton: false,
                timer: 1500
              })
              // alert()
            }
        });
        
    });
    $('#pil').click(function() {
        var status = $(this).prop('checked') == true ? 'Y' : 'T'; 
        var user_id = $(this).data('id'); 
    alert("test");
        
       
    })


});
</script>

  @endpush
  
@endsection