<table id="tabelKu" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Bank</th>
            <th>Total Bayar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bayar as $item)
        <tr class='clickable-row' data-id='{{ $item->id }}'>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tujuan->user->name }}</td>
            <td>{{ $item->bank }}</td>
            <td>@currency($item->total_bayar)</td>
            <td>
                @if ($item->status=="Belum Bayar")
                <select name="status" id="status" data-id="{{ $item->id }}" class="form-control">
                    <option value="{{ $item->status }}" selected>{{ $item->status }}</option>
                    <option value="Sudah Bayar">Sudah Bayar</option>
                </select>
                @else
                Sudah Bayar
                @endif
            </td>
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
$('#status').on('change', function() {
    let value = $(this).val()
    if (value == "Sudah Bayar") {
        let href = $(this).data('id')
        let csrf_token = $('meta[name="csrf_token"]').attr('content');
        Swal.fire({
            title: 'Yakin?',
            text: "Apakah anda yakin pelanggan tersebut telah membayar? Status tidak dapat diubah kembali",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'danger',
            cancelButtonColor: 'success',
            confirmButtonText: 'Yakin',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "pembayaran/" + href,
                    type: "POST",
                    data: {
                        '_method': 'PUT',
                        '_token': csrf_token,
                        'id': href
                    },
                    success: function(response) {
                        console.log(response)
                        Swal.fire(
                            'Diubah!',
                            'Data Berhasil Diubah',
                            'success'
                        )
                        $('#tampil').load('{{ route("pembayaran.create") }}');
                    }
                })
            }
        })

        return 0;
    }
})
</script>

<script>
$(document).ready(function() {
    $('#tabelKu').DataTable();
});
</script>