@extends('admin.layouts.default')

@section('judul','Pembayaran')

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('adminTools/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminTools/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('adminTools/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert -->
    <link href="{{ asset('adminTools/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('adminTools/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">
                    Data @yield('judul')
                </h4>
                <p class="text-muted mb-3">Status pembayaran yang telah diubah tidak dapat dikembalikan</p>
                <div class="table-rep-plugin">
                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                        <div id="tampil" class="tampil"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection

@section('js')

 <!-- Parsley js -->
 <script src="{{ asset('adminTools/plugins/parsleyjs/parsley.min.js') }}"></script>
 <script src="{{ asset('adminTools/assets/pages/jquery.validation.init.js') }}"></script>
 <script src="{{ asset('adminTools/assets/js/jquery.core.js') }}"></script>
 <!-- Sweet-Alert  -->
 <script src="{{ asset('adminTools/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
 <script src="{{ asset('adminTools/assets/pages/jquery.sweet-alert.init.js') }}"></script>
 <script src="{{ asset('adminTools/assets/pages/jquery.animate.init.js') }}"></script>


{{-- Tampilkan Data --}}
<script>
    $(document).ready(function(){
        $('#tampil').load('{{ route("pembayaran.create") }}');
        $('#tampil').attr('class', 'tampil  ' + 'zoomInRight' + '  animated');
    });
</script>

{{-- Tambah Data --}}
<script>

    $('#tambah').click(function(){
        save_method="add"
        $('#judul').html('From Tambah Data')
        $('#tombolForm').html('Simpan Data')
        $('#formKu').trigger("reset");
        $('.tampilModal').modal('show')
        console.log(save_method)
    });

    $(document).ready(function () {
        $("#formKu").on('submit',function(e){
          e.preventDefault();
          var id = $('#id').val();
          var dataKu = $('#formKu').serialize();
          if (save_method=="add") {
              url="{{ route('pembayaran.store') }}"
              method="POST"
          } else {
              url="pembayaran/"+id
              method="PUT"
          }
          $.ajax({
          url: url,
          type: method,
          data: dataKu,
          success: function(response) {
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                if (save_method=="add") {
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Ditambahkan'
                    })
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Diubah'
                    })
                    aksi=$('.tampilModal').modal('hide')
                }
              $('#id').val('');
              $('#nm_pembayaran').val('');
              $('#tampil').load('{{ route("pembayaran.create") }}');
            //   pesan
          }
          });
          console.log(save_method)
        });
    });

</script>

@endsection
