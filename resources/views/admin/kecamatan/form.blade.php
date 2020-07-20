<div class="modal fade tampilModal" id="myModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="judul"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formKu" class="needs-validation" novalidate> 
            @csrf
            <input type="hidden" name="id" id="id">            
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <label for="nm_kecamatan">Kecamatan</label>
                        <input type="text" id="nm_kecamatan" name="nm_kecamatan" class="form-control" placeholder="kecamatan" required>
                        <div class="invalid-feedback">
                            Tidak Boleh Kosong
                        </div>
                    </div><!--end col-->
                </div><!--end form-row-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button class="btn btn-gradient-primary" type="submit" id="tombolForm"></button>
            </div>
            </div>
        </form>
    </div>
</div>
