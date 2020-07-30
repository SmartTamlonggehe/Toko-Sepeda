@extends('pelanggan.layout.default')

@section('judul', 'Checkout')

@section('content')

<div class="checkout-main-area pt-90 pb-90">
    <div class="container">
        <div id="tampil"></div>

        <div class="checkout-wrap pt-30">
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap mr-50">
                        <div class="checkout-account mt-25">
                            <input class="checkout-toggle" id="tambahPenerima" type="checkbox" >
                            <label for="tambahPenerima"><span id="tambahPenerima">Tambah Penerima</span></label>
                        </div>
                        <div class="different-address open-toggle mt-30">
                            <div class="contact-from contact-shadow">
                                <form action="" method="post" id="formKu">
                                    @csrf
                                    <input type="hidden" id="id" name="id">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-info mb-2">
                                                <label>Nama Penerima <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" id="nm_penerima" name="nm_penerima">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-select mb-2">
                                                <label>Kecamatan <abbr class="required" title="required">*</abbr></label>
                                                <select name="id_kecamatan" id="id_kecamatan">
                                                    <option value="" selected="selected">Pilih</option>
                                                    @foreach ($kecamatan as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nm_kecamatan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="billing-select mb-2">
                                                <label>Kelurahan <abbr class="required" title="required">*</abbr></label>
                                                <select name="id_kelurahan" id="id_kelurahan" disabled>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>Alamat <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" id="alamat" name="alamat">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="billing-info mb-20">
                                                <label>No.Hp Penerima <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" id="no_hp" name="no_hp">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button class="submit" type="submit">Tambah Penerima</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="your-order-area">
                        <h3>Daftar Belanja</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-info-wrap">
                                <div class="your-order-info">
                                    <ul>
                                        <li>Produk <span>Total</span></li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @foreach ($menuKeranjang as $item)
                                            <li>{{ $item->produk->nm_produk }} X {{ $item->jmlh }} <span>@currency($item->produk->harga) </span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="your-order-info order-subtotal">
                                    <ul>
                                        <li>Subtotal <span class="totalBelanja"></span></li>
                                    </ul>
                                </div>
                                <div class="your-order-info order-shipping">
                                    <ul>
                                        <li>
                                            <select name="" id="pilihKiriman"></select>
                                            <p id="hargaKiriman"></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="your-order-info order-total">
                                    <ul>
                                        <li>Kode Unik <span class="kodeUnik"></span></li>
                                    </ul>
                                </div>
                                <div class="your-order-info order-total">
                                    <ul>
                                        <li>Total Bayar <span class="totalBayar">Silahkan pilih tujuan</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="pay-top sin-payment">
                                    <input id="payment_method_1" class="input-radio radio-bank" type="radio" value="BRI" checked name="payment_method">
                                    <label for="payment_method_1"> Transfer Bank BRI </label>
                                    <div class="payment-box payment_method_bacs">
                                        <p>A\n: Luis </p>
                                        <p>No. Rekening: 123443123-21123231-12 </p>
                                    </div>
                                </div>
                                <div class="pay-top sin-payment">
                                    <input id="payment-method-2" class="input-radio radio-bank" type="radio" value="BCA" name="payment_method">
                                    <label for="payment-method-2"> Transfer Bank BCA </label>
                                    <div class="payment-box payment_method_bacs">
                                        <p>A\n: Opan </p>
                                        <p>No. Rekening: 544-656-2323234 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-40">
                            <a href="#" id="prosesPembayaran">Pembayaran</a>
                        </div>

                        <form action="{{ route('tambahBayar') }}" method="POST" class="pay-top sin-payment" id="formBayar">
                            @csrf
                            <input type="hidden" name="id_tujuan" id="id_tujuan">
                            <input type="hidden" name="id_haki" id="id_haki">
                            <input type="hidden" value="BRI" name="bank" id="bank">
                            <input type="hidden" name="total_bayar" id="total_bayar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="tanyaToPembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <p>Yakin untuk melanjutkan ke pembayaran?</p>

          <button type="button" id="lanjutBayar" class="btn btn-danger">Yakin</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        </div>

      </div>
    </div>
  </div>


@endsection



@section('scripts')

<script>
    $('#tampil').load("{{ route('checkout.create') }}");
</script>

<script>
    $(document).ready(function(){

        let kelurahan = $('#id_kelurahan')

        $('#id_kecamatan').change(function(){
            if (!$(this).val()=='') {
                let id=$(this).val()
                $('#id_kelurahan').empty();
                kelurahan.removeAttr('disabled')
                $.getJSON("getkelurahan/"+id+"", function (data){
                    let items=[]
                    $.each(data, function(key,val){
                        $('#id_kelurahan').append('<option value="' + val.id +'">' + val.nm_kelurahan + '</option>');
                    })
                })
            }else{
                kelurahan.val("")
                kelurahan.attr("disabled", "disabled")
            }
        })

    })
</script>



<script>

    $(document).ready(function(){
        $('.radio-bank').change(function(){
            $('#bank').val($(this).val())
            console.log($(this).val());
        })
    })
    var acak=Math.floor(Math.random() * 901);
    $('.kodeUnik').html(acak)
    function hitungKeseluruhan(){
        let pilihKiriman=Number($('#pilihKiriman').val())
        let penjumlahan=sum+pilihKiriman+acak;
        $('.totalBayar').html(penjumlahan).number( true )
        $('#total_bayar').val(penjumlahan)
    }

</script>

<script>
    let toast = new ToastClass();
    function showToast () {
        toast.show({
        loading: true,
        onShow: function(){
            setTimeout(function(){
            toast.show({
                text: 'Tujuan atau Bank Belum Dipilih',
                duration: 1500,
                onHide: function(){
                console.log('Dihapus')
                }
            })
            }, )
        }
        })
    }

    $(document).ready(function(){

        $('#prosesPembayaran').click(function(){
            if (!$('#pilihKiriman').val()) {
                showToast();
                return 0;
            }
            $('#tanyaToPembayaran').modal('show');
                $('#lanjutBayar').on('click', function(){
                    $('#formBayar').submit();
                })
        })
    })
</script>

<script>
    $(document).ready(function () {
        $("#formBayar").on('submit',function(e){
          var dataKu = $('#formBayar').serialize();
              url="{{ route('tambahBayar') }}"
              method="POST"
          $.ajax({
          url: url,
          type: method,
          data: dataKu,
          success: function(response) {

          }
          });
        });
    });

</script>




@endsection
