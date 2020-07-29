 {{-- Foto --}}
 <link href="{{ asset('adminTools/plugins/filter/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
{{-- upload File --}}
<link href="{{ asset('adminTools/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
<table id="tabelKu" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Kategori</th>
            <th>Merek</th>
            <th>Berat</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $item)
        <tr class='clickable-row' data-id='{{ $item->id }}'>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nm_produk }}</td>
            <td>{{ $item->merek->kategori->nm_kategori }}</td>
            <td>{{ $item->merek->nm_merek }}</td>
            <td>{{ $item->berat }}</td>
            <td>@currency($item->harga)</td>
            <td>{{ $item->stok }}</td>
            <td>
                <a class="cbox-gallary1 mfp-image" href="{{ $item->getProduk() }}" title="{{ $item->nm_produk }}">
                    <img class="item-container mfp-fade" src="{{ $item->getProduk() }}" alt="Foto" width="50px" height="50px" />
                    <div class="item-mask">
                        <div class="item-caption">
                            <h5 class="text-light">{{ $item->nm_produk }}</h5>
                            <p class="text-light">{{ $item->merek->nm_merek }}</p>
                        </div>
                    </div>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



<script>
    $(document).ready(function($) {
    $(".clickable-row").dblclick(function() {
        var href= $(this).data('id');
        Swal.fire({
        title: 'Silahkan Pilih',
        text: "Mau di Apakan Data Ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'success',
        cancelButtonColor: 'danger',
        cancelButtonText: 'Hapus',
        confirmButtonText: 'Ubah'
    }).then((result) => {
        if (result.value) {
            save_method="Ubah"
            console.log(save_method);
            $.ajax({
                url: "produk/"+href+"/edit",
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    // lakukan sesuatu sebelum data dikirim
                    console.log(href);
                    },
                success: function(data) {
                    // lakukan sesuatu jika data sudah terkirim
                    $('#id').val(data.id);
                    $('#id_merek').val(data.id_merek); $('#id_merek').trigger('change');
                    $('#nm_produk').val(data.nm_produk);
                    let coba = $('#foto').attr("data-default-file","{{ URL::to ('/') }}/");
                    $('#foto').dropify({
                        messages: {
                            default: 'Klik Untuk Ubah Foto',
                            replace: 'Klik Untuk Ubah Foto',
                            remove:  'Hapus',
                            error:   'Error'
                        }
                    });
                    $('#berat').val(data.berat);
                    $('#harga').val(data.harga);
                    $('#stok').val(data.stok);
                    // console.log(coba);
                    $('.tampilModal').modal('show')
                    $('#judul').html('Silahkan Merubah Data')
                    $('#tombolForm').html('Ubah Data')
                }
            });
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
            var csrf_token=$('meta[name="csrf_token"]').attr('content');
            Swal.fire({
            title: 'Yakin ?',
            text: "Data akan dihapus permanen",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'success',
            cancelButtonColor: 'danger',
            confirmButtonText: 'Yakin',
            cancelButtonText: 'Batal'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "produk/" + href,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' :csrf_token},
                    success: function(response) {
                        console.log(response)
                        Swal.fire(
                                    'Dihapus!',
                                    'Data Berhasil Dihapus',
                                    'success'
                                )
                        $('#tampil').load('{{ route("produk.create") }}');
                    }
                })
            }
            })
        }
    })
    });
});
</script>

<!-- Required datatable js -->
<script src="{{ asset('adminTools/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminTools/assets/pages/jquery.datatable.init.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('adminTools/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminTools/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
{{-- <script src="{{ asset('adminTools/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/datatables/responsive.bootstrap4.min.js') }}"></script> --}}
{{-- Foto --}}
<script src="{{ asset('adminTools/plugins/filter/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/filter/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/filter/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('adminTools/assets/pages/jquery.gallery.init.js') }}"></script>




<script>
    $(document).ready( function () {
        $('#tabelKu').DataTable();
    } );
</script>
