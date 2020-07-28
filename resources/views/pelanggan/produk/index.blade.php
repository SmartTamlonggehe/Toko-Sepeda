@extends('pelanggan.layout.default')

@section('judul', 'Produk')

@section('content')

<div class="shop-area pt-90 pb-90">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-12">
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active pt-5">
                            <div class="row">
                                @forelse ($produk as $item)
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-6">
                                        <div class="product-wrap mb-35">
                                            <div class="product-img mb-15">
                                                <a href="{{ route('detProduk', $item->id) }}"><img src="{{ $item->foto }}" alt="product"></a>
                                            </div>
                                            <div class="product-content">
                                                <h5>{{ $item->merek->kategori->nm_kategori }}</h5>
                                                <span>{{ $item->merek->nm_merek }}</span>
                                                <h4><a href="{{ route('detProduk', $item->id) }}">{{ $item->nm_produk }}</a></h4>
                                                <div class="price-addtocart">
                                                    <div class="product-price">
                                                        <span>@currency($item->harga)</span>
                                                    </div>
                                                    <div class="product-addtocart">
                                                        <a title="Tambah Keranjang" href="#">Tambah Keranjang</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @empty
                                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-6">
                                    <h5 class="text-center">Produk Tidak Ada</h5>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="pagination-style text-center">
                            {{ $produk->links('vendor.pagination.materialize') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
