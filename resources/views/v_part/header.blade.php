<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
<div class="navbar navbar-fixed"> 
    <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow">
    <div class="nav-wrapper">
        {{-- <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
        <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Explore Materialize" data-search="template-list">
        <ul class="search-list collection display-none"></ul>
        </div> --}}

        <ul class="navbar-list right">
            <li>
                <a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown">
                    <i class="material-icons">notifications_none<small class="notification-badge">{{ $datas['notif_count'];}}</small></i>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown">
                    <span class="avatar-status avatar-online">
                        <img src="{{ asset('app-assets/images/avatar/avatar-1.png') }}" alt="avatar">
                        <i></i>
                    </span>
                </a>
            </li>
            <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li>
        </ul>


    
      @include('v_part/notif')
        <!-- profile-dropdown-->
        <ul class="dropdown-content" id="profile-dropdown">
            <li><a class="grey-text text-darken-1" href="{{ route('profile_user') }}"><i class="material-icons">person_outline</i> Profile</a></li>
            <li><a class="grey-text text-darken-1" href="app-chat.html"><i class="material-icons">chat_bubble_outline</i> Chat</a></li>
            <li><a class="grey-text text-darken-1" href="page-faq.html"><i class="material-icons">help_outline</i> Help</a></li>
            <li class="divider"></li>
            <li>
            <a class="grey-text text-darken-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="material-icons">keyboard_tab</i> Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    
    </nav>
</div>
</header>
<!-- END: Header-->