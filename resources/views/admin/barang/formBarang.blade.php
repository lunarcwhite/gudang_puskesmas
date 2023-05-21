<form action="{{ route('dashboard.barang.store') }}" method="post" id="formBarang" enctype="multipart/form-data">
    @csrf
    <div id="update">

    </div>
    <div class="form-group mt-1">
        <label for="nama_barang">Nama Barang: </label>
        <input id="nama_barang" type="text" name="nama_barang" placeholder="Nama Barang" class="form-control" />
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
