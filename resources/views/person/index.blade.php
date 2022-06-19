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
          <div class="col s2 m6 l6"><a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!" data-target="dropdown1"><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl">Settings</span><i class="material-icons right">arrow_drop_down</i></a>
            <ul class="dropdown-content" id="dropdown1" tabindex="0">
              <li tabindex="0"><a class="grey-text text-darken-2" href="user-profile-page.html">Profile<span class="new badge red">2</span></a></li>
              <li tabindex="0"><a class="grey-text text-darken-2" href="app-contacts.html">Contacts</a></li>
              <li tabindex="0"><a class="grey-text text-darken-2" href="page-faq.html">FAQ</a></li>
              <li class="divider" tabindex="-1"></li>
              <li tabindex="0"><a class="grey-text text-darken-2" href="user-login.html">Logout</a></li>
            </ul>
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
        <i class="material-icons mr-1">person_outline</i><span>Account</span>
      </a>
    </li>
    <li class="tab">
      <a class="display-flex align-items-center" id="information-tab" href="#information">
        <i class="material-icons mr-2">error_outline</i><span>Information</span>
      </a>
    </li>
  </ul>
  <div class="divider mb-3"></div>
  <div class="row">
    <div class="col s12" id="account">
      <!-- users edit media object start -->
      <div class="media display-flex align-items-center mb-2">
        <a class="mr-2" href="#">
          <img src="../../../app-assets/images/avatar/avatar-1.png" alt="users avatar" class="z-depth-4 circle"
            height="64" width="64">
        </a>
        <div class="media-body">
          <h5 class="media-heading mt-0">{{ $datas['DataUser']->email}} <small>{{ $datas['DataUser']->created_at }}</small> </h5>
          <div class="user-edit-btns display-flex">
            <a href="#" class="btn-small indigo">Change</a>
            <a href="#" class="btn-small btn-light-pink">Reset</a>
          </div>
        </div>
      </div>
      <!-- users edit media object ends -->
      <!-- users edit account form start -->
      <form id="accountForm" action="{{ route('person.update', $datas['DataUser']->id) }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <div class="row">
          <div class="col s12 m6">
            <div class="row">
              <div class="col s12 input-field">
                <input id="nama" name="nama" type="text" class="validate" value="{{ $datas['DataUser']->nama }}"
                  data-error=".errorTxt1">
                <label for="username">Username</label>
                <small class="errorTxt1"></small>
              </div>
              <div class="col s12 input-field">
                <input id="name" name="name" type="text" class="validate" value="{{ $datas['DataUser']->nama; }}"
                  data-error=".errorTxt2" readonly>
                <label for="name">Name</label>
                <small class="errorTxt2"></small>
              </div>
              <div class="col s12 input-field">
                <input id="noHP" name="noHP" type="text" class="validate">
                <label for="company">No HP</label>
              </div>
              <div class="col s12 input-field">
                <input id="email" name="email" type="text" class="validate" value="{{ $datas['DataUser']->email}}" >
                <label for="company">Email</label>
              </div>
              
            </div>
          </div>
          <div class="col s12 m6">
            <div class="row">
              <div class="col s12 input-field">
                <select>
                  <option>Dokter</option>
                  <option>Apotik</option>
                  <option>validator</option>
                  <option>Klinik</option>
                  <option>Manejemen</option>
                  <option>Admin</option>
                  <option>Adminstrator</option>
                </select>
                <label>Role</label>
              </div>
              <div class="col s12 input-field">
                <select>
                  <option>Active</option>
                  <option>Banned</option>
                  <option>Close</option>
                </select>
                <label>Status</label>
              </div>
              <div class="col s12 input-field">
                <input id="company" name="company" type="text" class="validate">
                <label for="company">Company</label>
              </div>
            </div>
          </div>
        
          <div class="col s12 display-flex justify-content-end mt-3">
            <button type="submit" class="btn indigo">
              Save changes</button>&nbsp;
            <button type="button" class="btn btn-light">Cancel</button>
          </div>
        </div>
      </form>
      <!-- users edit account form ends -->
    </div>
    <div class="col s12" id="information">
      <!-- users edit Info form start -->
      <form id="infotabForm">
        <div class="row">
          <div class="col s12 m6">
            <div class="row">
              <div class="col s12">
                <h6 class="mb-2"><i class="material-icons mr-1">link</i>Social Links</h6>
              </div>
              <div class="col s12 input-field">
                <input class="validate" type="text" value="https://www.twitter.com/">
                <label>Twitter</label>
              </div>
              <div class="col s12 input-field">
                <input class="validate" type="text" value="https://www.facebook.com/">
                <label>Facebook</label>
              </div>
              <div class="col s12 input-field">
                <input class="validate" type="text">
                <label>Google+</label>
              </div>
              <div class="col s12 input-field">
                <input id="linkedin" name="linkedin" class="validate" type="text">
                <label for="linkedin">LinkedIn</label>
              </div>
              <div class="col s12 input-field">
                <input class="validate" type="text" value="https://www.instagram.com/">
                <label>Instagram</label>
              </div>
            </div>
          </div>
          <div class="col s12 m6">
            <div class="row">
              <div class="col s12">
                <h6 class="mb-4"><i class="material-icons mr-1">person_outline</i>Personal Info</h6>
              </div>
              <div class="col s12 input-field">
                <input id="datepicker" name="datepicker" type="text" class="birthdate-picker datepicker"
                  placeholder="Pick a birthday" data-error=".errorTxt4">
                <label for="datepicker">Birth date</label>
                <small class="errorTxt4"></small>
              </div>
              <div class="col s12 input-field">
                <select id="accountSelect">
                  <option>USA</option>
                  <option>India</option>
                  <option>Canada</option>
                </select>
                <label>Country</label>
              </div>
              <div class="col s12">
                <label>Languages</label>
                <select class="browser-default" id="users-language-select2" multiple="multiple">
                  <option value="English" selected>English</option>
                  <option value="Spanish">Spanish</option>
                  <option value="French">French</option>
                  <option value="Russian">Russian</option>
                  <option value="German">German</option>
                  <option value="Arabic" selected>Arabic</option>
                  <option value="Sanskrit">Sanskrit</option>
                </select>
              </div>
              <div class="col s12 input-field">
                <input id="phonenumber" type="text" class="validate" value="(+656) 254 2568">
                <label for="phonenumber">Phone</label>
              </div>
              <div class="col s12 input-field">
                <input id="address" name="address" type="text" class="validate" data-error=".errorTxt5">
                <label for="address">Address</label>
                <small class="errorTxt5"></small>
              </div>
            </div>
          </div>
          <div class="col s12">
            <div class="input-field">
              <input id="websitelink" name="websitelink" type="text" class="validate">
              <label for="websitelink">Website</label>
            </div>
            <label>Favourite Music</label>
            <div class="input-field">
              <select class="browser-default" id="users-music-select2" multiple="multiple">
                <option value="Rock">Rock</option>
                <option value="Jazz" selected>Jazz</option>
                <option value="Disco">Disco</option>
                <option value="Pop">Pop</option>
                <option value="Techno">Techno</option>
                <option value="Folk" selected>Folk</option>
                <option value="Hip hop">Hip hop</option>
              </select>
            </div>
          </div>
          <div class="col s12">
            <label>Favourite movies</label>
            <div class="input-field">
              <select class="browser-default" id="users-movies-select2" multiple="multiple">
                <option value="The Dark Knight" selected>The Dark Knight
                </option>
                <option value="Harry Potter" selected>Harry Potter</option>
                <option value="Airplane!">Airplane!</option>
                <option value="Perl Harbour">Perl Harbour</option>
                <option value="Spider Man">Spider Man</option>
                <option value="Iron Man" selected>Iron Man</option>
                <option value="Avatar">Avatar</option>
              </select>
            </div>
          </div>
          <div class="col s12 display-flex justify-content-end mt-1">
            <button type="submit" class="btn indigo">
              Save changes</button>
            <button type="button" class="btn btn-light">Cancel</button>
          </div>
        </div>
      </form>
      <!-- users edit Info form ends -->
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
    
@endpush

@endsection