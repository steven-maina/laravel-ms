
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow mb-5" data-scroll-to-active="true">

    <div class="navbar-header mb-3 mt-0 text-center">
        <ul class="nav navbar-nav flex-row ">
            <li class="nav-item me-auto">
                {{-- <a class="" href="#">
                    <center><img src="{!! asset('app-assets/images/sidaiweblogo.png') !!}" alt="Learning" class="img" width="100%">
                    </center>
                </a> --}}
            </li>
        </ul>

    </div>
    <div class="shadow-bottom "></div>
    <div class="main-menu-content mb-3">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{!! route('dashboard') !!}">
                    <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Todo">
                        Dashboards</span>
                </a>
            </li>
            @if(Auth::user()->role=='admin' || Auth::user()->role=='teacher')
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="{{route('users.index')}}">
                        <i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Todo">
                            Users</span>
                    </a>
                </li>
                   @endif
                   @if(Auth::user()->role=='Admin' || Auth::user()->role=='student' || Auth::user()->role=='teacher')
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="{{route('courses.index')}}">
                        <i data-feather="list"></i><span class="menu-title text-truncate" data-i18n="Todo">
                            All Courses</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role=='student')
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="{{route('enrollments.index')}}">
                        <i data-feather="folder"></i><span class="menu-title text-truncate" data-i18n="Todo">
                            Enrollments</span>
                    </a>
                </li>
                   @endif
            </ul>
            </div>
   <div class="md-5">
   </div>
</div>
