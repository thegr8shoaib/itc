@if (!superAdmin())
@php
$obj = getNotifcations(30);
@endphp


@if ($obj->hasNotification)
<li class="dropdown dropdown-notification nav-item">
    <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i>
        @if ($obj->new->count())
        <span class="badge badge-pill badge-primary badge-up">{{ $obj->new->count() }}</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right  @if(!$obj->hasNew && $obj->hasOld) successRightNoti @endif">

        @if ($obj->hasNew)
        <li class="dropdown-menu-header">
            <div class="dropdown-header m-0 p-2">
                <h3 class="white">{{ $obj->new->count() }} New</h3><span class="notification-title">App Notifications</span>
            </div>
        </li>

        @endif

        <li class="scrollable-container media-list">
            @foreach ($obj->new as $noti)
            <a class="d-flex justify-content-between" href="{{ $noti->redirectURL }}">
                <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather font-medium-5 icon-bell primary"></i></div>
                    <div class="media-body">
                        <h6 class="primary media-heading">{{ $noti->title }}</h6>
                        <small class="notification-text">
                            {{ $noti->description }}
                        </small>
                    </div><small>
                        <time class="media-meta">{{ $noti->created_at->diffForHumans() }}</time></small>
                </div>
            </a>
            @endforeach
        </li>

        @if ($obj->hasOld)
          <li class="dropdown-menu-header bg-success">
              <div class="dropdown-header m-0 p-2">
                  <h3 class="white">{{ $obj->old->count() }} Old</h3><span class="notification-title">App Notifications</span>
              </div>
          </li>
        @endif
        <li class="scrollable-container media-list">
            @foreach ($obj->old as $noti)
            <a class="d-flex justify-content-between" href="{{ $noti->redirectURL }}">
                <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather font-medium-5 icon-bell primary"></i></div>
                    <div class="media-body">
                        <h6 class="primary media-heading">{{ $noti->title }}</h6>
                        <small class="notification-text">
                            {{ $noti->description }}
                        </small>
                    </div><small>
                        <time class="media-meta">{{ $noti->created_at->diffForHumans() }}</time></small>
                </div>
            </a>
            @endforeach
        </li>



        {{-- <li class="dropdown-menu-footer">
          <a class="dropdown-item p-1 text-center" href="javascript:void(0)">View all notifications</a>
        </li> --}}
        <li class="dropdown-menu-footer">
          <a class="dropdown-item p-1 text-center" href="{{ route('markNotificationRead') }}">Mark notifications as Read</a>
        </li>
    </ul>
</li>
@endif
@endif

@if (superAdmin())
@php
$obj = getNotifcations(30,true);
@endphp


@if ($obj->hasNotification)
<li class="dropdown dropdown-notification nav-item">
    <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i>
        @if ($obj->new->count())
        <span class="badge badge-pill badge-primary badge-up">{{ $obj->new->count() }}</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right @if(!$obj->hasNew && $obj->hasOld) successRightNoti @endif">

        @if ($obj->hasNew)
        <li class="dropdown-menu-header">
            <div class="dropdown-header m-0 p-2">
                <h3 class="white">{{ $obj->new->count() }} New</h3><span class="notification-title">App Notifications</span>
            </div>
        </li>

        @endif

        <li class="scrollable-container media-list">
            @foreach ($obj->new as $noti)
            <a class="d-flex justify-content-between" href="{{ $noti->redirectURL }}">
                <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather font-medium-5 icon-bell primary"></i></div>
                    <div class="media-body">
                        <h6 class="primary media-heading">{{ $noti->title }}</h6>
                        <small class="notification-text">
                            {{ $noti->description }}
                        </small>
                    </div><small>
                        <time class="media-meta">{{ $noti->created_at->diffForHumans() }}</time></small>
                </div>
            </a>
            @endforeach
        </li>

        @if ($obj->hasOld)
          <li class="dropdown-menu-header bg-success">
              <div class="dropdown-header m-0 p-2">
                  <h3 class="white">{{ $obj->old->count() }} Old</h3><span class="notification-title">App Notifications</span>
              </div>
          </li>
        @endif
        <li class="scrollable-container media-list">
            @foreach ($obj->old as $noti)
            <a class="d-flex justify-content-between" href="{{ $noti->redirectURL }}">
                <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather font-medium-5 icon-bell primary"></i></div>
                    <div class="media-body">
                        <h6 class="primary media-heading">{{ $noti->title }}</h6>
                        <small class="notification-text">
                            {{ $noti->description }}
                        </small>
                    </div><small>
                        <time class="media-meta">{{ $noti->created_at->diffForHumans() }}</time></small>
                </div>
            </a>
            @endforeach
        </li>



        {{-- <li class="dropdown-menu-footer">
          <a class="dropdown-item p-1 text-center" href="javascript:void(0)">View all notifications</a>
        </li> --}}
        <li class="dropdown-menu-footer">
          <a class="dropdown-item p-1 text-center" href="{{ route('markNotificationRead') }}">Mark notifications as Read</a>
        </li>
    </ul>
</li>
@endif
@endif
