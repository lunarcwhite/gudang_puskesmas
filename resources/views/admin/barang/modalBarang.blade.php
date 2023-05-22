<div class="modal fade text-left" id="modalBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="labelModal">
                </h4>
                <button type="button" class="btn btn-outline-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.barang.store') }}" method="post" id="formBarang" enctype="multipart/form-data">
                    @csrf
                    <div id="update">
                
                    </div>
                    <div class="form-group mt-1">
                        <label for="nama_barang">Nama Barang: </label>
                        <input id="nama_barang" type="text" name="nama_barang" placeholder="Nama Barang" class="form-control" />
                    </div>
                    <div class="form-group mt-1">
                        <label for="stok">Stok Barang: </label>
                        <input id="stok_barang" type="text" name="stok_barang" placeholder="Stok" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Nama Kategori: </label>
                        <select name="kategori_id" id="kategori_id" class="form-select select">
                            <option value=""> --> Pilih Kategori <-- </option>
                                    @foreach ($kategoris as $kategori)
                                        <div id="kategori_nama"></div>
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group boxed">
                        <label for="file">Photo Barang: </label>
                        <div id="gambar-barang" class="mb-2">
                        </div>
                        <input class="form-control image-input file" type="file" name="photo_barang" placeholder="Ambil Photo">
                        <div class="image-preview mt-3">
                            <span>Preview Gambar : </span>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button type="button" id="btn-submit" onclick="formConfirmation('Simpan Data?','#formBarang')"
                    class="btn btn-primary ms-1">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
