  <!-- notifications-dropdown-->
  <ul class="dropdown-content" id="notifications-dropdown">
    <li>
        <h6>Notifikasi<span class="new badge">{{ $datas['notif_count'];}}</span></h6>
    </li>
    <li class="divider"></li>
   
    @forelse ($datas['notifications'] as $item)
        <li>
            <a class="black-text" href="#">
            <span class="material-icons icon-bg-circle teal small">settings</span> 
             dari {{ $item->data['user_name'] }}  </a>
            <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">{{ $item->created_at }}</time>
        </li>
    @empty
        
    @endforelse
   

   
</ul>
