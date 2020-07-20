@extends('admin.layouts.default')

@section('judul','Harga Kirim')

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('adminTools/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminTools/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('adminTools/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 
    <!-- Sweet Alert -->
    <link href="{{ asset('adminTools/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('adminTools/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
    <!-- Plugins css -->
    <link href="{{ asset('adminTools/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminTools/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminTools/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminTools/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('adminTools/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title"><button id="tambah" type="button" class="btn btn-primary">
                    Tambah Data @yield('judul')
                </button></h4>
                @include('admin.hargaKirim.form')
                <p class="text-muted mb-3">Klik 2x pada data dalam tabel untuk merubah atau menghapus data tersebut</p>
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
 <!-- Plugins js -->
<script src="{{ asset('adminTools/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('adminTools/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('adminTools/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('adminTools/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('adminTools/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
{{-- Mask --}}
<script src="{{ asset('adminTools/plugins/mask/jquery.mask.js') }}"></script>
<script src="{{ asset('adminTools/plugins/mask/jquery.mask.min.js') }}"></script>

<script src="{{ asset('adminTools/assets/pages/jquery.forms-advanced.js') }}"></script>

{{-- Format Uang --}}
<script>
    $(document).ready(function(){
        $( '.uang' ).mask('000.000.000', {reverse: true});
    })
</script>
{{-- Tampilkan Data --}}
<script>
    $(document).ready(function(){
        $('#tampil').load('{{ route("hargaKirim.create") }}');
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
        $("#id_kelurahan").val('').trigger('change');
        $("#id_jasa").val('').trigger('change');
        console.log(save_method)
    });

    $(document).ready(function () {
        $("#formKu").on('submit',function(e){
          e.preventDefault();
          var id = $('#id').val();
          var dataKu = $('#formKu').serialize();
          if (save_method=="add") { 
              url="{{ route('hargaKirim.store') }}"
              method="POST"
          } else {
              url="hargaKirim/"+id
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
              $('#hari').val('');
              $('#harga').val('');
              $('#tampil').load('{{ route("hargaKirim.create") }}');
            //   pesan
          }
          });
          console.log(save_method)
        });
    });

</script>
    
@endsection
