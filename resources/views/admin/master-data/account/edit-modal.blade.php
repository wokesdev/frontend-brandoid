<div class="modal fade" id="editModal" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="titleModal">Edit Akun</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <form id="editForm" name="editForm" class="form-horizontal" autocomplete="off" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nomorAkunEdit" class="col-sm-12 control-label">Nomor Akun</label>
                                <div class="col-sm-12"><input type="number" class="form-control" id="nomorAkunEdit" name="nomor_akun" placeholder="Contoh: 100" required></div>
                            </div>
                            <div class="form-group">
                                <label for="namaAkunEdit" class="col-sm-12 control-label">Nama Akun</label>
                                <div class="col-sm-12"><input type="text" class="form-control" id="namaAkunEdit" name="nama_akun" placeholder="Contoh: Aktiva Lancar" required></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelButton" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="editButton" form="editForm">Submit</button>
            </div>
        </div>
    </div>
</div>
