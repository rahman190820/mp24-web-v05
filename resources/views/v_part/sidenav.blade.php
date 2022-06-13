<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
<div class="brand-sidebar">
    <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down" src="../../../app-assets/images/logo/materialize-logo-color.png" alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up" src="../../../app-assets/images/logo/materialize-logo.png" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">MP24</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
</div>
<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">

    <li class="active bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge pill orange float-right mr-10">1</span></a>
        <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li class="active"><a class="active" href="dashboard-modern.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Halaman Utama</span></a>
            </li>
          
            </ul>
        </div>
    </li>
   
    {{-- batas pasien --}}
        <li class="navigation-header">
            <a class="navigation-header-text">Menu Pasien </a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{ route('home') }}">
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
                <li><a href="page-contact.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Contact">Manfaat</span></a>
                </li>
                <li><a href="page-blog-list.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog">Diagnosa</span></a>
                </li>
                <li><a href="page-search.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Search">Apotik</span></a>
                </li>
                <li><a href="page-knowledge.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Knowledge">Tagihan</span></a>
                </li>
            
                </ul>
            </div>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">face</i>
                <span class="menu-title" data-i18n="User">Turunan </span>
                <span class="badge badge pill purple float-right mr-10">4</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li><a href="page-users-list.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="List">List</span></a>
                </li>
                <li><a href="page-users-view.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="View">View</span></a>
                </li>
                <li><a href="page-users-edit.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Edit">Edit</span></a>
                </li>
                </ul>
            </div>
        </li>
    {{-- batas pasien --}}

     {{-- batas Turunan pasien --}}
        <li class="navigation-header">
            <a class="navigation-header-text">Menu Turunan Pasien </a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{ route('home') }}">
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
                <li><a href="page-contact.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Contact">Manfaat</span></a>
                </li>
                <li><a href="page-blog-list.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog">Diagnosa</span></a>
                </li>
                <li><a href="page-search.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Search">Apotik</span></a>
                </li>
                <li><a href="page-knowledge.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Knowledge">Tagihan</span></a>
                </li>
            
                </ul>
            </div>
        </li>
  
    {{-- batas Turunan pasien --}}

    {{-- menu dokter --}}
        <li class="navigation-header">
            <a class="navigation-header-text">Menu Dokter </a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{ route('home') }}">
                <i class="material-icons">person_outline</i>
                <span class="menu-title" data-i18n="User Profile">Profil Dokter</span>
            </a>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">cast</i>
                <span class="menu-title" data-i18n="Cards">Pasien</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li><a href="cards-basic.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Cards">Cards</span></a>
                </li>
                <li><a href="cards-advance.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Cards Advance">Cards Advance</span></a>
                </li>
                <li><a href="cards-extended.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Cards Extended">Cards Extended</span></a>
                </li>
                </ul>
            </div>
        </li>
        
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">add_to_queue</i>
                <span class="menu-title" data-i18n="Extra Components">Laporan Dokter</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li><a href="extra-components-range-slider.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Range Slider">Range Slider</span></a>
                </li>
                <li><a href="extra-components-sweetalert.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Sweetalert">Sweetalert</span></a>
                </li>
            
                </ul>
            </div>
        </li>
    {{-- menu dokter --}}


     {{-- menu Apotik --}}
        <li class="navigation-header">
            <a class="navigation-header-text">Menu Apotik </a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{ route('home') }}">
                <i class="material-icons">person_outline</i>
                <span class="menu-title" data-i18n="User Profile">Profil Apotik</span>
            </a>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">cast</i>
                <span class="menu-title" data-i18n="Cards">Resep</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li><a href="cards-basic.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Cards">Cards</span></a>
                </li>
                <li><a href="cards-advance.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Cards Advance">Cards Advance</span></a>
                </li>
                <li><a href="cards-extended.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Cards Extended">Cards Extended</span></a>
                </li>
                </ul>
            </div>
        </li>
        
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">add_to_queue</i>
                <span class="menu-title" data-i18n="Extra Components">Laporan Apotik</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li><a href="extra-components-range-slider.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Range Slider">Range Slider</span></a>
                </li>
                <li><a href="extra-components-sweetalert.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Sweetalert">Sweetalert</span></a>
                </li>
            
                </ul>
            </div>
        </li>
     {{-- menu Apotik --}}

     
     {{-- menu Laboratorium --}}
        <li class="navigation-header">
            <a class="navigation-header-text">Menu Laboratorium </a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{ route('home') }}">
                <i class="material-icons">person_outline</i>
                <span class="menu-title" data-i18n="User Profile">Profil Laboratorium</span>
            </a>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">cast</i>
                <span class="menu-title" data-i18n="Cards">Resep</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li><a href="cards-basic.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Cards">Cards</span></a>
                </li>
                <li><a href="cards-advance.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Cards Advance">Cards Advance</span></a>
                </li>
                <li><a href="cards-extended.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Cards Extended">Cards Extended</span></a>
                </li>
                </ul>
            </div>
        </li>
        
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)">
                <i class="material-icons">add_to_queue</i>
                <span class="menu-title" data-i18n="Extra Components">Laporan Laboratorium</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li><a href="extra-components-range-slider.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Range Slider">Range Slider</span></a>
                </li>
                <li><a href="extra-components-sweetalert.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Sweetalert">Sweetalert</span></a>
                </li>
            
                </ul>
            </div>
        </li>
     {{-- menu Laboratorium --}}

   

      {{-- menu Admin --}}
        <li class="navigation-header"><a class="navigation-header-text">Menu Admin</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">pie_chart_outlined</i><span class="menu-title" data-i18n="Chart">Administrator</span></a>
        <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li><a href="charts-chartjs.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="ChartJS">ChartJS</span></a>
            </li>
            </ul>
        </div>
        </li>
      {{-- menu Admin --}}

     {{-- menu Validator --}}
        <li class="navigation-header"><a class="navigation-header-text">Menu Validator</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">pie_chart_outlined</i><span class="menu-title" data-i18n="Chart">Pengguna baru</span></a>
        <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li><a href="charts-chartjs.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="ChartJS">ChartJS</span></a>
            </li>
            </ul>
        </div>
        </li>
     {{-- menu validator --}}

    {{-- menu supprt --}}
        <li class="navigation-header"><a class="navigation-header-text">Menu Support</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">pie_chart_outlined</i><span class="menu-title" data-i18n="Chart">Log System</span></a>
        <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li><a href="charts-chartjs.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="ChartJS">ChartJS</span></a>
            </li>
            </ul>
        </div>
        </li>
    {{-- menu support --}}


      {{-- menu Manjemen --}}
        <li class="navigation-header"><a class="navigation-header-text">Menu Manajemen</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">pie_chart_outlined</i><span class="menu-title" data-i18n="Chart">Monitoring</span></a>
        <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
            <li><a href="charts-chartjs.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="ChartJS">ChartJS</span></a>
            </li>
            </ul>
        </div>
        </li>
      {{-- menu Manjemen --}}
  

    {{-- hubungi dev --}}
        <li class="navigation-header">
            <a class="navigation-header-text">Komunikasi </a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
    
        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{ route('home') }}">
                <i class="material-icons">import_contacts</i>
                <span class="menu-title" data-i18n="Documentation">Dokumentasi</span>
            </a>
        </li>
        <li class="bold">
            <a class="waves-effect waves-cyan " href="{{ route('home') }}">
                <i class="material-icons">help_outline</i>
                <span class="menu-title" data-i18n="Documentation">Bantuan</span>
            </a>
        </li>
    {{-- hubungi dev --}}


    {{-- coming soon --}}
       <li class="navigation-header"><a class="navigation-header-text">Akuntansi &amp; Keungan </a><i class="navigation-header-icon material-icons">more_horiz</i>
       </li>
       <li class="bold"><a class="waves-effect waves-cyan " href="form-layouts.html"><i class="material-icons">image_aspect_ratio</i><span class="menu-title" data-i18n="Form Layouts">Fitur Akan Datang 😎</span></a>
       </li>
   {{-- coming soon --}}

    
</ul>
<div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>