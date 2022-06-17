 <!-- START RIGHT SIDEBAR NAV -->
 <aside id="right-sidebar-nav">
    <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation">
        <div class="row">
        <div class="slide-out-right-title">
            <div class="col s12 border-bottom-1 pb-0 pt-1">
            <div class="row">
                <div class="col s2 pr-0 center">
                <i class="material-icons vertical-text-middle"><a href="#" class="sidenav-close">clear</a></i>
                </div>
                <div class="col s10 pl-0">
                <ul class="tabs">
                    <li class="tab col s4 p-0">
                    <a href="#messages" class="active">
                        <span>Messages</span>
                    </a>
                    </li>
                    {{-- <li class="tab col s4 p-0">
                    <a href="#settings">
                        <span>Settings</span>
                    </a>
                    </li> --}}
                    <li class="tab col s4 p-0">
                    <a href="#activity">
                        <span>Activity</span>
                    </a>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        <div class="slide-out-right-body row pl-3">
            @include('v_part/right_navbar/pesan')
            {{-- @include('v_part/right_navbar/general') --}}
            @include('v_part/right_navbar/aktifitas')
        </div>
        </div>
    </div>

    <!-- Slide Out Chat -->
    <ul id="slide-out-chat" class="sidenav slide-out-right-sidenav-chat">
        <li class="center-align pt-2 pb-2 sidenav-close chat-head">
        <a href="#!"><i class="material-icons mr-0">chevron_left</i>Elizabeth Elliott</a>
        </li>
        <li class="chat-body">
        <ul class="collection">
            <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
            <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
                alt="avatar" />
            </span>
            <div class="user-content speech-bubble">
                <p class="medium-small">hello!</p>
            </div>
            </li>
            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
            <div class="user-content speech-bubble-right">
                <p class="medium-small">How can we help? We're here for you!</p>
            </div>
            </li>
            <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
            <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
                alt="avatar" />
            </span>
            <div class="user-content speech-bubble">
                <p class="medium-small">I am looking for the best admin template.?</p>
            </div>
            </li>
            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
            <div class="user-content speech-bubble-right">
                <p class="medium-small">Materialize admin is the responsive materializecss admin template.</p>
            </div>
            </li>

            <li class="collection-item display-grid width-100 center-align">
            <p>8:20 a.m.</p>
            </li>

            <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
            <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
                alt="avatar" />
            </span>
            <div class="user-content speech-bubble">
                <p class="medium-small">Ohh! very nice</p>
            </div>
            </li>
            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
            <div class="user-content speech-bubble-right">
                <p class="medium-small">Thank you.</p>
            </div>
            </li>
            <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
            <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
                alt="avatar" />
            </span>
            <div class="user-content speech-bubble">
                <p class="medium-small">How can I purchase it?</p>
            </div>
            </li>

            <li class="collection-item display-grid width-100 center-align">
            <p>9:00 a.m.</p>
            </li>

            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
            <div class="user-content speech-bubble-right">
                <p class="medium-small">From ThemeForest.</p>
            </div>
            </li>
            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
            <div class="user-content speech-bubble-right">
                <p class="medium-small">Only $24</p>
            </div>
            </li>
            <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
            <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
                alt="avatar" />
            </span>
            <div class="user-content speech-bubble">
                <p class="medium-small">Ohh! Thank you.</p>
            </div>
            </li>
            <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
            <span class="avatar-status avatar-online avatar-50"><img src="../../../app-assets/images/avatar/avatar-7.png"
                alt="avatar" />
            </span>
            <div class="user-content speech-bubble">
                <p class="medium-small">I will purchase it for sure.</p>
            </div>
            </li>
            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
            <div class="user-content speech-bubble-right">
                <p class="medium-small">Great, Feel free to get in touch on</p>
            </div>
            </li>
            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
            <div class="user-content speech-bubble-right">
                <p class="medium-small">https://pixinvent.ticksy.com/</p>
            </div>
            </li>
        </ul>
        </li>
        <li class="center-align chat-footer">
        <form class="col s12" onsubmit="slideOutChat()" action="javascript:void(0);">
            <div class="input-field">
            <input id="icon_prefix" type="text" class="search" />
            <label for="icon_prefix">Type here..</label>
            <a onclick="slideOutChat()"><i class="material-icons prefix">send</i></a>
            </div>
        </form>
        </li>
    </ul>
</aside>
<!-- END RIGHT SIDEBAR NAV -->