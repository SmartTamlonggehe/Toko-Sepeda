@extends('pelanggan.layout.default')

@section('judul', 'Dashboard')
    

@section('content')

    <div class="slider-area slider-height-3 bg-img res-white-overly-xs" style="background-image:url({{ asset('pelangganTools/images/slider/background1.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="ml-auto col-lg-6 col-md-7 col-12">
                    <div class="slider-content-3">
                        <h1 class="wow fadeInUp">Selamat Datang Di Toko <br>Sepeda Kasih Anugerah.</h1>
                            {{-- <p class="wow fadeInUp">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p> --}}
                            <div class="slider-btn-3 default-btn btn-hover hover-border-none">
                                {{-- <a class="wow fadeInUp btn-color-white btn-size-md-2 btn-color-theme-bg border-radious-5 black-color" href="product-details.html">SHOP NOW</a> --}}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pt-80 pb-50">
        <div class="container">
            <div class="section-title-2 text-center">
                <h2>Produk Terbaru</h2>
                <img src="{{ asset('pelangganTools/images/icon-img/title-shape.png') }}" alt="icon-img">
            </div>
            <div class="row">
                @foreach ($produkBaru as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-wrap product-border-1 product-img-zoom mb-30">
                            <div class="product-img">
                                <a href="{{ route('detProduk', $item->id) }}"><img src="{{ $item->foto }}" alt="Gagal Dimuat"></a>
                                <div class="product-action-2">
                                    <a title="Tambah Keranjang" href="#"><i class="la la-cart-plus"></i></a>
                                </div>
                            </div>
                            <div class="product-content product-content-padding">
                                <h4><a href="{{ route('detProduk', $item->id) }}">{{ $item->nm_produk }}</a></h4>
                                <div class="price-addtocart">
                                    <div class="product-price">
                                        <span>Rp. {{ number_format($item->harga, 0, ".", ".")  }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection