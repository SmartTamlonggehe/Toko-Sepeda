<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategori as $item)
        <tr class='clickable-row' data-id='{{ $item->id }}'>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nm_kategori }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


    <!-- Required datatable js -->
    <script src="{{ asset('adminTools/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminTools/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
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
    <script src="{{ asset('adminTools/assets/pages/jquery.datatable.init.js') }}"></script>

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
                $.ajax({
                    url: "kategori/"+href+"/edit", 
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function() {
                        // lakukan sesuatu sebelum data dikirim
                        console.log(href);
                        },
                    success: function(data) {
                        // lakukan sesuatu jika data sudah terkirim
                        $('#id').val(data.id);
                        $('#nm_kategori').val(data.nm_kategori);
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
                        url: "kategori/" + href,
                        type : "POST",
                        data : {'_method' : 'DELETE', '_token' :csrf_token},
                        success: function(response) {
                            console.log(response)
                            Swal.fire(
                                        'Dihapus!',
                                        'Data Berhasil Dihapus',
                                        'success'
                                    )
                            $('#tampil').load('{{ route("kategori.create") }}');
                        }
                    })
                }
              })
            }
        })
        });
    });
    </script>



