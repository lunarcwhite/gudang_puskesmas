<div class="modal fade text-left" id="modalStok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="labelModal">
            </h4>
            <button type="button" class="btn btn-outline-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('dashboard.obat.stok',$obat->id)}}" method="post" id="formStok">
                @method('put')
                @csrf
                <input type="hidden" value="" name="pilihan" id="pilihan">
                <input type="hidden" name="id" value="{{$obat->id}}">
                <div class="form-group mb-3">
                    <label for="">Stok Saat Ini: </label>
                    <input type="text" class="form-control" value="{{$obat->stok_obat}}" name="jumlah">
                </div>
                <div class="form-group mb-3">
                    <label for="" id="stok_baru">Jumlah: </label>
                    <input type="text" class="form-control" name="jumlah">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button type="button" id="btn-submit"
                class="btn btn-primary ms-1" onclick="formConfirmation('Update Stok?')">
                Tambah
            </button>
        </form>
        </div>
    </div>
</div>
</div>