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
                        <label for="no_resi">No. Resi</label>
                        <input type="text" id="no_resi" name="no_resi" class="form-control" placeholder="No. Resi" required>
                        <div class="invalid-feedback">
                            Tidak Boleh Kosong
                        </div>
                    </div><!--end col-->
                    <div class="col-md-12 mb-12">
                        <label for="status_kirim">Status Kirim</label>
                        <input type="text" id="status_kirim" name="status_kirim" class="form-control" placeholder="jasa" required>
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
