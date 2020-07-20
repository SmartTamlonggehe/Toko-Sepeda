<div class="your-order-area">
    <h4>Tujuan Pengiriman</h4>
    <div class="your-order-wrap">
        <div class="payment-method">
@foreach ($tujuan as $item)
                <div class="pay-top sin-payment">   
                    <input type="radio" name="radioTujuan" class="input-radio radioTujuan" id="{{ $item->id }}" data-id="{{ $item->id }}" value="{{ $item->id_kelurahan }}">
                    <label for="{{ $item->id }}"> {{ $item->nm_penerima }} <a class="liat{{ $item->id }}">Lihat Selengkapnya</a> </label>
                    <div class="daftar{{ $item->id }}" style="display: none">
                        <p class="ml-4">Alamat Penerima: {{ $item->alamat }}</p>
                        <p class="ml-4">Kecamatan {{ $item->kelurahan->kecamatan->nm_kecamatan }}, Kelurahan {{ $item->kelurahan->nm_kelurahan }}</p>
                        <p class="ml-4">No. Hp: {{ $item->no_hp }}</p>
                    </div> 
                </div>
@endforeach
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        let tujuan="{{ $tujuan }}"
        let konvert=JSON.parse(tujuan.replace(/&quot;/g,'"'));
        $.each( konvert, function( key, value ) {
            $(".liat"+value.id).click(function() {
                $(".daftar"+value.id).toggle("slow");
            });
        });            
    })  
</script>

<script>
    $(document).ready(function(){       
        $('.radioTujuan').change(function(){
            $('#pilihKiriman option').remove()
            let idku = $(this).val()
            let id_haki=$(this).data('id')
            $('#id_tujuan').val(id_haki)
            ambilJasa(idku);
        })         
    })
// Ambil jasa dari controller checkout
    function ambilJasa(id){
        $.getJSON("getjasa/"+id+"", function (data){
                    let items=[]
                    $.each(data, function(key,val){
                        console.log(val);
                        $('#pilihKiriman').append('<option class="pilihEkspedisi" value="' + val.harga +'">' + val.jasa.nm_jasa + '</option>');
                        $('#id_haki').val(val.id)
                        $('#hargaKiriman').html(val.harga).number( true )
                    })
                    hitungKeseluruhan()
                })  
    }
// ambil Harga Kirim Berdasarkan Ekspedisi
    $(document).ready(function(){
        $('#pilihKiriman').change(function(){
            let idJasa=$('#pilihKiriman').val()
            $('#hargaKiriman').html(idJasa).number( true )
            hitungKeseluruhan()
        })
    })
</script>
