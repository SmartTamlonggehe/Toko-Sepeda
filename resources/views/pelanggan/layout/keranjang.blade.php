
<button class="cart-active">
    <i class="la la-shopping-cart"></i>
        <span class="count-style">{{ $menuKeranjang->count() }} Produk</span>
</button>
<div class="shopping-cart-content">
    <div class="shopping-cart-top">
        <h4>Keranjangmu </h4>
        <a class="cart-close" href="#"><i class="la la-close"></i></a>
    </div>
    <ul>
        @foreach ($menuKeranjang as $item)
        <li class="single-shopping-cart">
            <div class="shopping-cart-img">
                <a href="{{ route('detProduk', $item->produk->id) }}"><img alt="" src="{{ $item->produk->getProduk() }}"></a>
                <div class="item-close">
                    <a href="#"><i class="sli sli-close"></i></a>
                </div>
            </div>
            <div class="shopping-cart-title ">
                <h4><a href="{{ route('detProduk', $item->produk->id) }}">{{ $item->produk->nm_produk }}</a></h4>
                <h5>Jumlah: <span id="jmlhKeranjang">{{ $item->jmlh }}</span></h5>
                <span>@currency($item->produk->harga)</span>
                <p class="hargaProduk" id="hargaProduk" style="display: none">{{ $item->produk->harga *  $item->jmlh }}</p>
            </div>
            <div class="shopping-cart-delete">
                <a data-id="{{ $item->id }}" class="hapusProdukKeranjang"><i class="la la-trash"></i></a>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="shopping-cart-bottom">
        <div class="shopping-cart-total">
            <h4>Total <span class="shop-total totalBelanja" id="totalBelanja"></span></h4>
        </div>
        <div class="shopping-cart-btn btn-hover default-btn text-center">
            @if ($menuKeranjang!=[])
                <a class="black-color" href="{{ route('checkout.index') }}">Lanjut ke Chackout</a>
            @endif
        </div>
    </div>
</div>


<script>
$('.hapusProdukKeranjang').on('click',function (){
    let id = $(this).data('id');
    console.log('hallo');

    let confirm = new ConfirmClass();
    confirm.show({
    title: 'Yakin',
    content: 'Yakin Untuk Menghapus',
    btns: [{
        text: 'Ya',
        callback: function(){
        hapusProdukKeranjang(id);
        }
    }, {
        text: 'Tidak',
        callback: function(){
        console.log('Tidak');
        }
    }],
    onShow: function(){
        console.log('Tampil')
    }
    })
})

function hapusProdukKeranjang(id){
    let csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: "/pelanggan/keranjang/" + id,
        type : "POST",
        data : {'_method' : 'DELETE', '_token' :csrf_token},
        success: function(response) {
            showToast();
            $('#tampilKeranjang').load('{{ route("keranjang.index") }}');
        }
    })
}

let toast = new ToastClass();
  function showToast () {
    toast.show({
      loading: true,
      onShow: function(){
        setTimeout(function(){
          toast.show({
            text: 'Dihapus',
            duration: 1500,
            onHide: function(){
              console.log('Dihapus')
            }
          })
        }, )
      }
    })
  }
</script>

<script>
    // $('.hargaProduk').each(function(index, value) {
    //     console.log(index + ':' + $(value).text());
    // });

    let sum = 0;
    $('.hargaProduk').each(function() {
        sum += Number($(this).text());
    });
    console.log(sum);
    $('.totalBelanja').append(sum)
    $('.totalBelanja').number( true )
</script>



