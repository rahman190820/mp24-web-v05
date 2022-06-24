@extends('layouts.apps')
@section('konten')

@push('panggil_css')
    
@endpush

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
      <!-- Search for small screen-->
      <div class="container">
        <div class="row">
          <div class="col s10 m6 l6">
            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Users edit</span></h5>
            <ol class="breadcrumbs mb-0">
              <li class="breadcrumb-item"><a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">User</a>
              </li>
              <li class="breadcrumb-item active">Users Edit
              </li>
            </ol>
          </div>
        
        </div>
      </div>
    </div>
    <div class="col s12">
      <div class="container">
        <!-- users edit start -->
<div class="section users-edit">
<div class="card">
<div class="card-content">
  <!-- <div class="card-body"> -->
  <ul class="tabs mb-2 row">
    <li class="tab">
      <a class="display-flex align-items-center active" id="account-tab" href="#account">
        <i class="material-icons ">person_outline</i><span>Akun </span>
      </a>
    </li>
  
  </ul>
  <div class="divider mb-3"></div>
  <div class="row">
    <div class="col s12" id="account">
      <!-- users edit media object start -->
      <div class="media display-flex align-items-center mb-2">
        <a class="mr-2" href="#">
          <form action="#" method="post">
            
          <img src="../../../app-assets/images/avatar/avatar-1.png" alt="users avatar" class="z-depth-4 circle"
            height="64" width="64">
          </form>
        </a>
        <div class="media-body">
          <h5 class="media-heading mt-0">{{ $datas['DataUser']->email}} <small>{{ $datas['DataUser']->created_at }}</small> </h5>
          <div class="user-edit-btns display-flex">
           
          </div>
        </div>
      </div>
      <!-- users edit media object ends -->
      <!-- users edit account form start -->
      <?php
       if ($datas['DataUser']->noKartu == null) {
        ?>
        <form id="accountForm" action="{{ route('person.update', $datas['DataUser']->id) }}" method="post">
      <?php
      } else {
        ?>
        <form>
    <?php
      }
          
      ?>
     
      
        @csrf
        @method('PUT')
        {{-- {{ method_field('PUT') }} --}}
        <div class="row">
          <div class="col s12 m6">
            <div class="row">
              <div class="col s12 input-field">
                <input id="noKartu" name="noKartu" type="text" class="validate" value="{{ $datas['DataUser']->noKartu }}"
                  data-error=".errorTxt1" required>
                <label for="noKartu">Nomer Kartu</label>
                <small class="errorTxt1"></small>
              </div>
              <div class="col s12 input-field">
                <input id="noPeserta" name="noPeserta" type="text" class="validate" value="{{ $datas['DataUser']->noPeserta; }}"
                  required >
                <label for="noPeserta">Nomer Peserta</label>
                <small class="errorTxt2"></small>
              </div>
              <div class="col s12 input-field">
                <input id="nama" name="nama" type="text" class="validate" value="{{ $datas['DataUser']->nama; }}"  required>
                <label for="nama">Nama Lengkap</label>
              </div>
              <div class="col s12 input-field">
                <input id="tanggalLahir" name="tanggalLahir" type="date" class="validate" value="{{ $datas['DataUser']->tanggalLahir; }}" required>
                <label for="tglLahir">Tanggal Lahir</label>
              </div>
              <div class="col s12 input-field">
                <p>
                  <label>
                    <input class="with-gap" name="group1" type="radio" value="L" {{ $datas['DataUser']->jenisKelamin == 'L' ? '':'checked' ; }}  required/>
                    <span>Laki Laki</span>
                    
                  </label>
                </p>

                <p>
                  <label>
                    <input class="with-gap" name="group1" type="radio" value="P" {{ $datas['DataUser']->jenisKelamin  == 'P' ? 'checked':'' ; }} required/>
                    <span>Perempuan</span>
                  </label>
                </p>
                
              </div>
              <div class="col s12 input-field">
                <input id="noHP" name="noHP" type="text" class="validate nomer" value="{{ $datas['DataUser']->noHP; }}">
                <label for="noHP">No HP</label>
              </div>
              <div class="col s12 input-field">
                <input id="email" name="email" type="text" class="validate" value="{{ $datas['DataUser']->email}}" >
                <label for="email">Email</label>
              </div>
              
            </div>
          </div>
          <div class="col s12 m6">
            <div class="row">
              <div class="col s12 input-field">
                <input id="alamat" name="alamat" type="text" class="validate" value="{{ $datas['DataUser']->alamat ? $datas['DataUser']->alamat:'' ; }}"
                   required>
                <label for="alamat">Alamat</label>
                <small class="errorTxt2"></small>
              </div>
              <div class="col s12 input-field">
                <input id="kodepos" name="kodepos" type="text" class="validate" value="{{ $datas['DataUser']->kodepos; }}"
                   required>
                <label for="kodepos">kodepos</label>
                <small class="errorTxt2"></small>
              </div>
            
              {{-- <div class="col s12 input-field">
                <input id="company" name="company" type="text" class="validate" required>
                <label for="company">Company</label>
              </div> --}}
            </div>
          </div>
        
          <div class="col s12 display-flex justify-content-end mt-3">
            <?php
            if ($datas['DataUser']->noKartu == null) {
             ?>
              <button type="submit" class="btn indigo">
              Save changes</button>
          <?php
           } else {
             ?>
             
         <?php
           }
               
           ?>
           
              
              &nbsp;
            <button type="button" class="btn btn-light">Cancel</button>
          </div>
        </div>
      </form>
      <!-- users edit account form ends -->
    </div>
  
  </div>
  <!-- </div> -->
</div>
</div>
</div>
<!-- users edit ends -->

@include('v_part.kananSidebar')

<div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top"><a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow"><i class="material-icons">add</i></a>
<ul>
    <li><a href="css-helpers.html" class="btn-floating blue"><i class="material-icons">help_outline</i></a></li>
    <li><a href="cards-extended.html" class="btn-floating green"><i class="material-icons">widgets</i></a></li>
    <li><a href="app-calendar.html" class="btn-floating amber"><i class="material-icons">today</i></a></li>
    <li><a href="app-email.html" class="btn-floating red"><i class="material-icons">mail_outline</i></a></li>
</ul>
</div>
      </div>
      <div class="content-overlay"></div>
    </div>
  </div>

@push('panggil_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/jquery.inputmask.min.js" integrity="sha512-zdfH1XdRONkxXKLQxCI2Ak3c9wNymTiPh5cU4OsUavFDATDbUzLR+SYWWz0RkhDmBDT0gNSUe4xrQXx8D89JIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.nomer').inputmask("99-9999-9999-999");  //static mask

});
</script>

<script>
  
</script>
@endpush

@endsection