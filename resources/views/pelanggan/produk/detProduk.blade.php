@extends('pelanggan.layout.default')

@section('judul', 'Detail Produk')

@section('content')

@foreach ($detProduk as $item)

<div class="product-details-area pt-90 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-img-left">
                    <img class="zoompro" src="{{ $item->getProduk() }}" data-zoom-image="{{ $item->getProduk() }}" alt="product-details-img">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-details-content pro-details-content-modify">
                    <span>{{ $item->merek->nm_merek }}</span>
                    <h2>{{ $item->nm_produk }}</h2>
                    <div class="pro-details-price-wrap">
                        <div class="product-price">
                            <span>Rp. {{ number_format($item->harga, 0, ".", ".")  }}</span>
                        </div>
                    </div>
                    <div class="pro-details-quality">
                        <form action="{{ route('keranjang.store') }}" id="formKeranjang" method="post">
                            @csrf
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" id="jmlh" type="text" name="jmlh" value=1>
                            </div>
                            <input type="hidden" name="id_produk" id="id_produk" value="{{ $item->id }}">
                            @if (Auth::user())
                                <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                            @endif
                        </form>
                    </div>
                    <div class="pro-details-buy-now btn-hover btn-hover-radious">
                        <a class="tambahKeranjang" href="#">Tambah Keranjang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-wrapper pb-90">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-10">
                <div class="dec-review-topbar nav mb-40">
                    <a class="active" data-toggle="tab" href="#des-details2">Detail</a>
                </div>
                <div class="tab-content dec-review-bottom">
                    <div id="des-details2" class="tab-pane active">
                        <div class="specification-wrap table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="width1">Nama Produk</td>
                                        <td>{{ $item->nm_produk }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>{{ $item->merek->kategori->nm_kategori }}</td>
                                    </tr>
                                    <tr>
                                        <td class="width1">Merek</td>
                                        <td>{{ $item->merek->nm_merek }}</td>
                                    </tr>
                                    <tr>
                                        <td class="width1">Berat</td>
                                        <td>{{ $item->berat }} Gram</td>
                                    </tr>
                                    <tr>
                                        <td class="width1">Stok</td>
                                        <td>{{ $item->stok }}</td>
                                    </tr>
                                    <tr>
                                        <td class="width1">Harga</td>
                                        <td>Rp. {{ number_format($item->harga, 0, ".", ".")  }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach

<div class="product-area pb-85">
    <div class="container">
        <div class="section-title-6 mb-50 text-center">
            <h2>Produk Lainnya</h2>
        </div>
        <div class="product-slider-active owl-carousel">
            @foreach ($produkLain as $item)
            <div class="product-wrap">
                <div class="product-img mb-15">
                    <a href="{{ route('detProduk', $item->id) }}"><img src="{{ $item->getProduk() }}" alt="product"></a>
                </div>
                <div class="product-content">
                    <span>{{ $item->merek->nm_merek }}</span>
                    <h4><a href="{{ route('detProduk', $item->id) }}">{{ $item->nm_produk }}</a></h4>
                    <div class="price-addtocart">
                        <div class="product-price">
                            <span>Rp. {{ number_format($item->harga, 0, ".", ".")  }}</span>
                        </div>
                        {{-- <div class="product-addtocart">
                            <a title="Tambah Keranjang" class="tambahKeranjang" href="#">Tambah Keranjang</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection



@section('scripts')

<script>
    $('.tambahKeranjang').click (function(e) {
        e.preventDefault();
        let user = $('#id_user').val()
        console.log(user)
        if (!user) {
            window.location.replace('{{ route("loginPelanggan") }}')
            return 0
        }
        let data =$('#formKeranjang').serialize();
            $.ajax({
                url: "{{ route('keranjang.store') }}",
                type: 'POST',
                data: data,
                success: function(res) {
                    $('#tampilKeranjang').load('{{ route("keranjang.index") }}');
                }
            });
    });
</script>

{{-- <script>
    $(document).ready(function () {
        $("#formKu").on('submit',function(e){
          e.preventDefault();
          var id = $('#id').val();
          var dataKu = $('#formKu').serialize();
          if (save_method=="add") {
              url="{{ route('dosen.store') }}"
              method="POST"
          } else {
              url="dosen/"+id
              method="PUT"
          }
          $.ajax({
          url: url,
          type: method,
          data: dataKu,
          success: function(response) {
                if (save_method=="add") {
                    pesan=swal('Berhasil Ditambahkan').catch(swal.noop)
                    aksi=""
                } else {
                    pesan=swal('Data Berhasil Diubah').catch(swal.noop)
                    aksi=$('.tampilModal').modal('hide')
                }
              $('#id').val('');
              $('#NPM').val('');
              $('#nm_dosen').val('');
              $('#tempat').val('');
              $('#tgl_lahir').val('');
              $('#agama').val('');
              $('#alamat').val('');
              $('#jbt_fung').val('');
              $('#tampil').load('{{ route("dosen.create") }}');
            //   pesan
          }
          });
          console.log(save_method)
        });
    });
</script> --}}

@endsection
