<div class="modal fade text-left" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="labelModal">
                </h4>
                <button type="button" class="btn btn-outline-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('admin.kategori.formKategori')
            </div>
            <div class="modal-footer">
                <button class="btn btn-light-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <button type="button" id="btn-submit" onclick="formConfirmation('Simpan Data?','#formKategori')"
                    class="btn btn-primary ms-1">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
