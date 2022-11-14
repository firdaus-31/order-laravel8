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
                            <a href="{{ route('profile') }}" class="dropdown-item">
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
                <a href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="icon icon-home"></i><span class="nav-text">Dashboard</span></a>
            </li>
            <li class="nav-label">Data Master</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon icon-app-store"></i><span class="nav-text">Makanan & Minuman</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{route('menu_makanan')}}">Menu Makanan</a></li>
                    <li><a href="{{route('menu_minuman')}}">Menu Minuman</a></li>
                </ul>
            </li>
            <li><a href="{{route('meja')}}" aria-expanded="false"><i class="icon icon-plug"></i><span class="nav-text">Meja Pelanggan</span></a>
            </li>
            <li><a href="{{route('dapur')}}" aria-expanded="false"><i class="icon icon-layout-25"></i><span class="nav-text">Data Dapur</span></a>
            </li>
            <li class="nav-label">Master Pegawai</li>
            <li><a href="{{route('pegawai')}}" aria-expanded="false"><i class="icon icon-single-04"></i><span class="nav-text">Data Pegawai</span></a>
            </li>
            <li class="nav-label">Laporan</li>
            <li><a href="{{route('laporan_dapur_admin')}}" aria-expanded="false"><i class="icon icon-book-open-2"></i><span class="nav-text">Laporan Orderan Selesai</span></a>
            <li><a href="{{route('laporan_transaksi_admin')}}" aria-expanded="false"><i class="icon icon-book-open-2"></i><span class="nav-text">Laporan Transaksi</span></a>
            </li>
        </ul>
    </div>


</div>