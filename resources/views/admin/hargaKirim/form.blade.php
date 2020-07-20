<div class="modal fade tampilModal" id="myModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="judul"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formKu" method="POST" class="needs-validation" novalidate> 
            @csrf
            <input type="hidden" name="id" id="id">            
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12 mb-2">
                        <label for="id_kelurahan">Kelurahan</label>
                        <select id="id_kelurahan" name="id_kelurahan" class="select2 form-control mb-3 custom-select">
                            <option value="">Pilih kelurahan</option>
                            @foreach ($kecamatan as $itemKec)
                            <optgroup label="{{ $itemKec->nm_kecamatan }}">
                                @foreach ($kelurahan as $item)
                                    @if ($item->id_kecamatan==$itemKec->id)
                                        <option value="{{ $item->id }}">{{ $item->nm_kelurahan }}</option>
                                    @endif
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Tidak Boleh Kosong
                        </div>
                    </div><!--end col-->
                    <div class="col-md-12 mb-2">
                        <label for="id_jasa">Jasa Pengiriman</label>
                        <select id="id_jasa" name="id_jasa" class="select2 form-control mb-3 custom-select">
                            <option value="">Pilih Jasa</option>
                                @foreach ($jasa as $item)
                                        <option value="{{ $item->id }}">{{ $item->nm_jasa }}</option>
                                @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Tidak Boleh Kosong
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 mb-2">
                        <label for="hari">Waktu Kirim</label>
                        <input type="number" id="hari" name="hari" class="form-control" placeholder="hari" required>
                        <div class="invalid-feedback">
                            Tidak Boleh Kosong
                        </div>
                    </div><!--end col-->
                    <div class="col-md-9 mb-2">
                        <label for="harga">Harga</label>
                        <input type="text" id="harga" name="harga" class="form-control uang" placeholder="Harga" required>
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


