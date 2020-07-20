@extends('admin.layouts.default')

@section('judul','Kategori')

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

                <h4 class="mt-0 header-title"><button id="tambah" type="button" class="btn btn-primary">
                    Tambah Data @yield('judul')
                </button></h4>
                @include('admin.kategori.form')
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

{{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form class="form-inline">
                    <div class="form-group">
                    <label>Entrances</label>
                      <select class="form-control" id="entrance">
                        <optgroup label="Attention Seekers">
                          <option value="bounce">bounce</option>
                          <option value="flash">flash</option>
                          <option value="pulse">pulse</option>
                          <option value="rubberBand">rubberBand</option>
                          <option value="shake">shake</option>
                          <option value="swing">swing</option>
                          <option value="tada">tada</option>
                          <option value="wobble">wobble</option>
                          <option value="jello">jello</option>
                        </optgroup>
                        <optgroup label="Bouncing Entrances">
                          <option value="bounceIn" selected>bounceIn</option>
                          <option value="bounceInDown">bounceInDown</option>
                          <option value="bounceInLeft">bounceInLeft</option>
                          <option value="bounceInRight">bounceInRight</option>
                          <option value="bounceInUp">bounceInUp</option>
                        </optgroup>
                        <optgroup label="Fading Entrances">
                          <option value="fadeIn">fadeIn</option>
                          <option value="fadeInDown">fadeInDown</option>
                          <option value="fadeInDownBig">fadeInDownBig</option>
                          <option value="fadeInLeft">fadeInLeft</option>
                          <option value="fadeInLeftBig">fadeInLeftBig</option>
                          <option value="fadeInRight">fadeInRight</option>
                          <option value="fadeInRightBig">fadeInRightBig</option>
                          <option value="fadeInUp">fadeInUp</option>
                          <option value="fadeInUpBig">fadeInUpBig</option>
                        </optgroup>
                        <optgroup label="Flippers">
                          <option value="flipInX">flipInX</option>
                          <option value="flipInY">flipInY</option>
                        </optgroup>
                        <optgroup label="Lightspeed">
                          <option value="lightSpeedIn">lightSpeedIn</option>
                        </optgroup>
                        <optgroup label="Rotating Entrances">
                          <option value="rotateIn">rotateIn</option>
                          <option value="rotateInDownLeft">rotateInDownLeft</option>
                          <option value="rotateInDownRight">rotateInDownRight</option>
                          <option value="rotateInUpLeft">rotateInUpLeft</option>
                          <option value="rotateInUpRight">rotateInUpRight</option>
                        </optgroup>
                        <optgroup label="Sliding Entrances">
                          <option value="slideInUp">slideInUp</option>
                          <option value="slideInDown">slideInDown</option>
                          <option value="slideInLeft">slideInLeft</option>
                          <option value="slideInRight">slideInRight</option>
                        </optgroup>
                        <optgroup label="Zoom Entrances">
                          <option value="zoomIn">zoomIn</option>
                          <option value="zoomInDown">zoomInDown</option>
                          <option value="zoomInLeft">zoomInLeft</option>
                          <option value="zoomInRight">zoomInRight</option>
                          <option value="zoomInUp">zoomInUp</option>
                        </optgroup>
                        
                        <optgroup label="Specials">
                          <option value="rollIn">rollIn</option>
                        </optgroup>
                      </select>
                   </div>
                    <div class="form-group">
                    <label>Exits</label>
                      <select class="form-control" id="exit">
                        <optgroup label="Attention Seekers">
                          <option value="bounce">bounce</option>
                          <option value="flash">flash</option>
                          <option value="pulse">pulse</option>
                          <option value="rubberBand">rubberBand</option>
                          <option value="shake">shake</option>
                          <option value="swing">swing</option>
                          <option value="tada">tada</option>
                          <option value="wobble">wobble</option>
                          <option value="jello">jello</option>
                        </optgroup>
                        <optgroup label="Bouncing Exits">
                          <option value="bounceOut">bounceOut</option>
                          <option value="bounceOutDown">bounceOutDown</option>
                          <option value="bounceOutLeft">bounceOutLeft</option>
                          <option value="bounceOutRight">bounceOutRight</option>
                          <option value="bounceOutUp">bounceOutUp</option>
                        </optgroup>
                        <optgroup label="Fading Exits">
                          <option value="fadeOut">fadeOut</option>
                          <option value="fadeOutDown">fadeOutDown</option>
                          <option value="fadeOutDownBig">fadeOutDownBig</option>
                          <option value="fadeOutLeft">fadeOutLeft</option>
                          <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                          <option value="fadeOutRight">fadeOutRight</option>
                          <option value="fadeOutRightBig">fadeOutRightBig</option>
                          <option value="fadeOutUp">fadeOutUp</option>
                          <option value="fadeOutUpBig">fadeOutUpBig</option>
                        </optgroup>
                        <optgroup label="Flippers">
                          <option value="flipOutX" selected>flipOutX</option>
                          <option value="flipOutY">flipOutY</option>
                        </optgroup>
                        <optgroup label="Lightspeed">
                          <option value="lightSpeedOut">lightSpeedOut</option>
                        </optgroup>
                        <optgroup label="Rotating Exits">
                          <option value="rotateOut">rotateOut</option>
                          <option value="rotateOutDownLeft">rotateOutDownLeft</option>
                          <option value="rotateOutDownRight">rotateOutDownRight</option>
                          <option value="rotateOutUpLeft">rotateOutUpLeft</option>
                          <option value="rotateOutUpRight">rotateOutUpRight</option>
                        </optgroup>
                        <optgroup label="Sliding Exits">
                          <option value="slideOutUp">slideOutUp</option>
                          <option value="slideOutDown">slideOutDown</option>
                          <option value="slideOutLeft">slideOutLeft</option>
                          <option value="slideOutRight">slideOutRight</option>
                        </optgroup>        
                        <optgroup label="Zoom Exits">
                          <option value="zoomOut">zoomOut</option>
                          <option value="zoomOutDown">zoomOutDown</option>
                          <option value="zoomOutLeft">zoomOutLeft</option>
                          <option value="zoomOutRight">zoomOutRight</option>
                          <option value="zoomOutUp">zoomOutUp</option>
                        </optgroup>
                        <optgroup label="Specials">
                          <option value="rollOut">rollOut</option>
                        </optgroup>
                        
                      </select>
                   </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Launch demo modal
                </button>
                </form>
                    
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>  --}}
<!-- end row -->  


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
        $('#tampil').load('{{ route("kategori.create") }}');
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
              url="{{ route('kategori.store') }}"
              method="POST"
          } else {
              url="kategori/"+id
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
              $('#nm_kategori').val('');
              $('#tampil').load('{{ route("kategori.create") }}');
            //   pesan
          }
          });
          console.log(save_method)
        });
    });

</script>
    
@endsection
