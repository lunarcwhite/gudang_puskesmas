<div class="modal fade text-left" id="modalObat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="labelModal">
                </h4>
                <button type="button" class="btn btn-outline-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.obat.store') }}" method="post" id="formObat">
                    @csrf
                    <div id="update">
                
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_barang">Nama Obat: </label>
                        <input id="nama_obat" type="text" name="nama_obat" placeholder="Nama Obat" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_barang">Harga Obat: </label>
                        <input id="harga_obat" type="text" name="harga_obat" placeholder="Harga Obat" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="stok">Stok Obat: </label>
                        <input id="stok_obat" type="text" name="stok_obat" placeholder="Stok Obat" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="stok">Expired Date: </label>
                        <input id="expired_obat" type="date" name="expired_obat" placeholder="Stok" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="kategori_id">Nama Kategori: </label>
                        <select name="kategori_id" id="kategori_id" class="form-select select">
                            <option value=""> --> Pilih Kategori <-- </option>
                                    @foreach ($kategoris as $kategori)
                                        <div id="kategori_nama"></div>
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                    <button type="button" id="btn-submit" onclick="formConfirmation('Simpan Data?')"
                    class="btn btn-primary ms-1">
                    Simpan
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
