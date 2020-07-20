<!-- Left Sidenav -->
<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu">
        <li class="@yield('Dashboard')">
            <a href="javascript: void(0);"><i class="ti-bar-chart"></i><span>Dashboard</span></a>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="ti-server"></i><span>Jualan</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ route('kategori.index') }}"><i class="ti-control-record"></i>Kategori</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('merek.index') }}"><i class="ti-control-record"></i>Merek</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('produk.index') }}"><i class="ti-control-record"></i>Produk</a></li>
            </ul>
        </li>                   

        <li>
            <a href="javascript: void(0);"><i class="ti-crown"></i><span>Ongkir</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="javascript: void(0);"><i class="ti-control-record"></i>Lokasi <span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('kecamatan.index') }}">Kecamatan</a></li>
                        <li><a href="{{ route('kelurahan.index') }}">Kelurahan</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('jasa.index') }}"><i class="ti-control-record"></i>Jasa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('hargaKirim.index') }}"><i class="ti-control-record"></i>Biaya Kirim</a></li>
            </ul>                        
        </li>

        <li>
            <a href="javascript: void(0);"><i class="ti-layers-alt"></i><span>Pages</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/pages/pages-profile.html') }}"><i class="ti-control-record"></i>Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/pages/pages-timeline.html') }}"><i class="ti-control-record"></i>Timeline</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/pages/pages-treeview.html') }}"><i class="ti-control-record"></i>Treeview</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/pages/pages-starter.html') }}"><i class="ti-control-record"></i>Starter Page</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/pages/pages-pricing.html') }}"><i class="ti-control-record"></i>Pricing</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/pages/pages-gallery.html') }}"><i class="ti-control-record"></i>Gallery</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="ti-lock"></i><span>Authentication</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/authentication/auth-login.html') }}"><i class="ti-control-record"></i>Log in</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/authentication/auth-register.html') }}"><i class="ti-control-record"></i>Register</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/authentication/auth-recover-pw.html') }}"><i class="ti-control-record"></i>Recover Password</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/authentication/auth-lock-screen.html') }}"><i class="ti-control-record"></i>Lock Screen</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/authentication/auth-404.html') }}"><i class="ti-control-record"></i>Error 404</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ asset('adminTools/authentication/auth-500.html') }}"><i class="ti-control-record"></i>Error 500</a></li>
            </ul>
        </li>
    </ul>
</div>
<!-- end left-sidenav-->