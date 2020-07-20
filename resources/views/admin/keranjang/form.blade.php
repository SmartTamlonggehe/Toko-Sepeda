<div class="modal fade tampilModal" id="myModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0" id="judul"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formKu" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate> 
            @csrf
            <input type="hidden" name="id" id="id">            
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12 mb-2">
                        <label for="nm_merek">Merek</label>
                        <select id="id_merek" name="id_merek" class="select2 form-control mb-3 custom-select">
                            <option value="">Pilih Merek</option>
                            @foreach ($kategori as $itemKat)
                            <optgroup label="{{ $itemKat->nm_kategori }}">
                                @foreach ($merek as $item)
                                    @if ($item->id_kategori==$itemKat->id)
                                        <option value="{{ $item->id }}">{{ $item->nm_merek }}</option>
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
                        <label for="nm_produk">Produk</label>
                        <input type="text" id="nm_produk" name="nm_produk" class="form-control" placeholder="Produk" required>
                        <div class="invalid-feedback">
                            Tidak Boleh Kosong
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 mb-2">
                        <label for="berat">Berat</label>
                        <input type="number" id="berat" name="berat" class="form-control" placeholder="Berat" required>
                        <div class="invalid-feedback">
                            Tidak Boleh Kosong
                        </div>
                    </div><!--end col-->
                    <div class="col-md-3 mb-2">
                        <label for="stok">Stok</label>
                        <input type="number" id="stok" name="stok" class="form-control" placeholder="Stok" required>
                        <div class="invalid-feedback">
                            Tidak Boleh Kosong
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6 mb-2">
                        <label for="harga">Harga</label>
                        <input type="text" id="harga" name="harga" class="form-control uang" placeholder="Harga" required>
                        <div class="invalid-feedback">
                            Tidak Boleh Kosong
                        </div>
                    </div><!--end col-->
                    <div class="col-md-12 mb-2">
                        <label for="foto">Gambar Produk</label>
                        <input type="file" id="foto" name="foto" class="dropify" data-default-file="" required>
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
