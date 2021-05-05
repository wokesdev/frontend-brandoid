<div class="modal fade" id="createModal" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="titleModal">Tambah Akun</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <form id="createForm" name="createForm" class="form-horizontal" autocomplete="off" action="{{ route('admin.coa.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nomorAkun" class="col-sm-12 control-label">Nomor Akun</label>
                                <div class="col-sm-12"><input type="number" class="form-control" id="nomorAkun" name="nomor_akun" placeholder="Contoh: 100" required></div>
                            </div>
                            <div class="form-group">
                                <label for="namaAkun" class="col-sm-12 control-label">Nama Akun</label>
                                <div class="col-sm-12"><input type="text" class="form-control" id="namaAkun" name="nama_akun" placeholder="Contoh: Aktiva Lancar" required></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="storeButton" form="createForm">Submit</button>
            </div>
        </div>
    </div>
</div>
