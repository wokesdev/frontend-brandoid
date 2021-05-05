<div class="modal fade" id="createModal" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="titleModal">Tambah Barang</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <form id="createForm" name="createForm" class="form-horizontal" autocomplete="off" action="{{ route('user.item.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="kodeBarang" class="col-sm-12 control-label">Kode Barang</label>
                                <div class="col-sm-12"><input type="text" class="form-control" id="kodeBarang" name="kode_barang" placeholder="Contoh: TAS01" required></div>
                            </div>
                            <div class="form-group">
                                <label for="namaBarang" class="col-sm-12 control-label">Nama Barang</label>
                                <div class="col-sm-12"><input type="text" class="form-control" id="namaBarang" name="nama_barang" placeholder="Contoh: Tas" required></div>
                            </div>
                            <div class="form-group">
                                <label for="hargaBeli" class="col-sm-12 control-label">Harga Beli (umum)</label>
                                <div class="col-sm-12"><input type="number" class="form-control" id="hargaBeli" name="harga_beli" placeholder="Contoh: 10000" required></div>
                            </div>
                            <div class="form-group">
                                <label for="hargaJual" class="col-sm-12 control-label">Harga Jual (umum)</label>
                                <div class="col-sm-12"><input type="number" class="form-control" id="hargaJual" name="harga_jual" placeholder="Contoh: 20000" required></div>
                            </div>
                            <div class="form-group">
                                <label for="stok" class="col-sm-12 control-label">Stok</label>
                                <div class="col-sm-12"><input type="number" class="form-control" id="stok" name="stok" placeholder="Contoh: 500" required></div>
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
