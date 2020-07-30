<div class="header-small-mobile">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 atas">
                {{-- <div class="mobile-search">
                    <form class="search-form" action="#">
                        <input type="text" placeholder="Search entire store…">
                        <button class="button-search"><i class="la la-search"></i></button>
                    </form>
                </div> --}}
            </div>
            <div class="col-6">
                <div class="header-right-wrap">
                    @if (Auth::user())
                    <div class="cart-wrap common-style">
                        <div id="tampilKeranjang"></div>
                    </div>
                    @endif
                    <div class="mobile-off-canvas">
                        <a class="mobile-aside-button" href="kemana"><i class="la la-navicon la-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
<div class="mobile-off-canvas-active">
    <a class="mobile-aside-close"><i class="la la-close"></i></a>
    <div class="header-mobile-aside-wrap">
        {{-- <div class="mobile-search">
            <form class="search-form" action="#">
                <input type="text" placeholder="Search entire store…">
                <button class="button-search"><i class="la la-search"></i></button>
            </form>
        </div> --}}
        <div class="mobile-menu-wrap">
            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><a href="{{ route('pelanggan') }}">Home</a></li>
                        <li class="menu-item-has-children"><a href="{{ route('produk') }}">Semua Produk</a></li>
                        <li class="menu-item-has-children "><a href="#">Kategori</a>
                            <ul class="dropdown">
                                @foreach ($menuKategori as $item)
                                    <li><a href="{{ route('katProduk',$item->id) }}">{{ $item->nm_kategori }} </a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
        </div>
        <div class="mobile-curr-lang-wrap">
            @if (Auth::user())
            <a href="{{ route('pelanggan') }}">Home</a>
            <div class="single-mobile-curr-lang">
                <a class="mobile-account-active" href="#">Akun <i class="la la-angle-down"></i></a>
                <div class="lang-curr-dropdown account-dropdown-active">
                    <ul>
                        <li><a href="{{ route('lihatBayar') }}">Riwayat Beli</a></li>
                        {{-- <li><a href="#">Profil</a></li> --}}
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                </div>
            </div>
            @else
            <a href="{{ route('loginPelanggan') }}">Login</a>
            @endif
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
