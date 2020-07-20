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
                        <label for="id_kecamatan">Kecamatan</label>
                        <select id="id_kecamatan" name="id_kecamatan" class="select2 form-control mb-3 custom-select">
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($kecamatan as $item)
                                <option value="{{ $item->id }}">{{ $item->nm_kecamatan }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Tidak Boleh Kosong
                        </div>
                    </div><!--end col-->
                    <div class="col-md-12 mb-12">
                        <label for="nm_kelurahan">kelurahan</label>
                        <input type="text" id="nm_kelurahan" name="nm_kelurahan" class="form-control" placeholder="kelurahan" required>
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
