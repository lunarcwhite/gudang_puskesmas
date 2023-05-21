<form action="{{ route('dashboard.kategori.store') }}" method="post" id="formKategori">
    @csrf
    <div id="update">

    </div>
    <div class="form-group mt-1">
        <label for="email">Nama Kategori: </label>
        <input id="nama_kategori" type="text" name="nama_kategori" placeholder="Nama Kategori"
            class="form-control" />
    </div>
</form>