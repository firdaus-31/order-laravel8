<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">

                </div>

                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{route('profile')}}" class="dropdown-item">
                                <i class="icon-user"></i>
                                <span class="ml-2">Profile </span>
                            </a>
                            <a href="{{ route('logout') }}" class="dropdown-item">
                                <i class="icon-key"></i>
                                <span class="ml-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('dashboard_dapur') }}" aria-expanded="false">
                    <i class="icon icon-home"></i><span class="nav-text">Dashboard</span></a>
            </li>
            <li class="nav-label">Laporan</li>
            </li>
            <li>
                <a href="{{ route('laporan_dapur') }}" aria-expanded="false">
                    <i class="icon icon-book-open-2"></i><span class="nav-text">Laporan Orderan Selesai</span></a>
            </li>
        </ul>
    </div>


</div>