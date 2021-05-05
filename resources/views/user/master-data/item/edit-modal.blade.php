<div class="modal fade" id="editModal" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="titleModal">Edit Barang</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <form id="editForm" name="editForm" class="form-horizontal" autocomplete="off" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="kodeBarangEdit" class="col-sm-12 control-label">Kode Barang</label>
                                <div class="col-sm-12"><input type="text" class="form-control" id="kodeBarangEdit" name="kode_barang" placeholder="Contoh: TAS01" required></div>
                            </div>
                            <div class="form-group">
                                <label for="namaBarangEdit" class="col-sm-12 control-label">Nama Barang</label>
                                <div class="col-sm-12"><input type="text" class="form-control" id="namaBarangEdit" name="nama_barang" placeholder="Contoh: Tas" required></div>
                            </div>
                            <div class="form-group">
                                <label for="hargaBeliEdit" class="col-sm-12 control-label">Harga Beli (umum)</label>
                                <div class="col-sm-12"><input type="number" class="form-control" id="hargaBeliEdit" name="harga_beli" placeholder="Contoh: 10000" required></div>
                            </div>
                            <div class="form-group">
                                <label for="hargaJualEdit" class="col-sm-12 control-label">Harga Jual (umum)</label>
                                <div class="col-sm-12"><input type="number" class="form-control" id="hargaJualEdit" name="harga_jual" placeholder="Contoh: 20000" required></div>
                            </div>
                            <div class="form-group">
                                <label for="stokEdit" class="col-sm-12 control-label">Stok</label>
                                <div class="col-sm-12"><input type="number" class="form-control" id="stokEdit" name="stok" placeholder="Contoh: 500" required></div>
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
