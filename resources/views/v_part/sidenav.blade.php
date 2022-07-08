<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
<div class="brand-sidebar">
    <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down" src="../../../app-assets/images/logo/materialize-logo-color.png" alt="materialize logo"/>
        <img class="show-on-medium-and-down hide-on-med-and-up" src="../../../app-assets/images/logo/materialize-logo.png" alt="materialize logo"/>
        <span class="logo-text hide-on-med-and-down">MP24</span></a>
        <a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
</div>
<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">

  
            
   
    @php
        if (auth()->user()->type == 'pasienParent'  ) {
    @endphp  
        
    {{-- batas pasien --}}
        <li>
            <a class="{{ Route::is('pasienP.home') ? 'active' : '' }}" href="{{ route('pasienP.home') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Halaman Utama</span></a>
        </li>
        <li class="navigation-header">
            <a class="navigation-header-text">Menu Pasien </a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan {{ Route::is('profile_user') ? 'active' : '' }}" href="{{ route('profile_user') }}">
                <i class="material-icons">person_outline</i>
                <span class="menu-title" data-i18n="User Profile">Profil Pasien</span>
            </a>
        </li>
        @php 
        if (auth()->user()->stts_approval == 'Y') {
        @endphp
        <li class=" {{ Route::is('riwayat.*') ? 'active' : '' }} bold {{ Route::is('riwayat.*') ? 'open' : '' }}">
            <a class="collapsible-header waves-effect waves-cyan  " href="JavaScript:void(0)">
                <i class="material-icons">content_paste</i>
                <span class="menu-title" data-i18n="Pages">Riwayat</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li class="active" ><a class="{{ Route::is('pasien.keluhan') ? 'active' : '' }}" href="{{ route('pasien.keluhan') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Contact">Keluhan</span></a>
                </li>
                <li><a class="{{ Route::is('riwayat.manfaat') ? 'active' : '' }}" href="{{ route('riwayat.manfaat') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog">Manfaat</span></a>
                </li>
                <li><a class="{{ Route::is('riwayat.diagnosa') ? 'active' : '' }}" href="{{ route('riwayat.diagnosa') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog">Diagnosa</span></a>
                </li>
                <li><a class="{{ Route::is('riwayat.apotik') ? 'active' : '' }}" href="{{ route('riwayat.apotik') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Search">Apotik</span></a>
                </li>
                <li><a class="{{ Route::is('riwayat.tagihan') ? 'active' : '' }}" href="{{ route('riwayat.tagihan') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Knowledge">Tagihan</span></a>
                </li>
            
                </ul>
            </div>
        </li>
        <li class="{{ Route::is('turunan.*') ? 'active' : '' }} bold {{ Route::is('turunan.*') ? 'open' : '' }}">
            <a class="collapsible-header waves-effect waves-blue " href="JavaScript:void(0)">
                <i class="material-icons">face</i>
                <span class="menu-title" data-i18n="User">Turunan </span>
                <span class="badge badge pill purple float-right mr-10">4</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li>
                    <a class="{{ Route::is('turunan.tambah') ? 'active' : '' }}" href="{{ route('turunan.tambah') }}">
                        <i class="material-icons">radio_button_unchecked</i>
                        <span data-i18n="Add">Tambah</span></a>
                </li>
                <li>
                    <a class="{{ Route::is('turunan.daftar') ? 'active' : '' }}" href="{{ route('turunan.daftar') }}">
                        <i class="material-icons">radio_button_unchecked</i>
                        <span data-i18n="View">View</span></a>
                </li>
                </ul>
            </div>
        </li>
        @php
        }
        @endphp
    {{-- batas pasien --}}
   @php
    } 
    @endphp

    @php
        if (auth()->user()->type == 'pasienChild') {
    @endphp
     {{-- batas Turunan pasien --}}

        <li>
            <a class="{{ Route::is('pasienC.home') ? 'active' : '' }}" href="{{ route('pasienC.home') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Halaman Utama</span></a>
        </li>
        <li class="navigation-header">
            <a class="navigation-header-text">Menu Turunan Pasien </a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{ route('pasienC.home') }}">
                <i class="material-icons">person_outline</i>
                <span class="menu-title" data-i18n="User Profile">Profil Pasien</span>
            </a>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">content_paste</i>
                <span class="menu-title" data-i18n="Pages">Riwayat</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li><a class="{{ Route::is('turunan.riwayat.manfaat') ? 'active' : '' }}" href="{{ route('turunan.riwayat.manfaat') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Contact">Manfaat</span></a>
                </li>
                <li><a class="{{ Route::is('turunan.riwayat.diagnosa') ? 'active' : '' }}" href="{{ route('turunan.riwayat.diagnosa') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog">Diagnosa</span></a>
                </li>
                <li><a class="{{ Route::is('turunan.riwayat.apotik') ? 'active' : '' }}" href="{{ route('turunan.riwayat.apotik') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Search">Apotik</span></a>
                </li>
                
                </ul>
            </div>
        </li>
  
     {{-- batas Turunan pasien --}}
    @php } @endphp

 

    
</ul>
<div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>