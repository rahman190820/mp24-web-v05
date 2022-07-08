@extends('layouts.apps')
@section('konten')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">
                        Daftar Obat
                    </h4>
                    <div class="row">
                        <div class="col s12">
                            <small>daftar</small>
                            <a class="btn waves-effect waves-light cyan modal-trigger" href="#m_diagnosa">Tambah</a>
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
    </div>

  <!-- Modal Structure -->
<div id="m_diagnosa" class="modal">
<div class="modal-content">
    <h4>Detail Obat</h4>
    <hr>
    <form action="#" method="post">
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
    
@include('v_part.kananSidebar')

@push('panggil_js')
<script>
$(document).ready(function(){
        $('.modal').modal({
          dismissible: false,
          opacity: .12,
          endingTop: '15%',
        });
    });
  
</script>
    
@endpush

@endsection