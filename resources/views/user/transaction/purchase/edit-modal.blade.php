<div class="modal fade" id="editModal" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="titleModal">Edit Pembelian</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <form id="editForm" name="editForm" class="form-horizontal" autocomplete="off" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="coaIdEdit" class="col-sm-12 control-label">Akun Pembelian</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="coaIdEdit" name="rincian_akun" required>
                                        <option value="" disabled selected>Pilih Akun</option>
                                        @foreach ($coas as $coa)
                                            <option value="{{ $coa['id'] }}">{{ $coa['nomor_rincian_akun'] }} - {{ $coa['nama_rincian_akun'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="coaPaymentIdEdit" class="col-sm-12 control-label">Akun Pembayaran</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="coaPaymentIdEdit" name="rincian_akun_pembayaran" required>
                                        <option value="" disabled selected>Pilih Akun</option>
                                        @foreach ($coas as $coa)
                                            <option value="{{ $coa['id'] }}">{{ $coa['nomor_rincian_akun'] }} - {{ $coa['nama_rincian_akun'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggalEdit" class="col-sm-12 control-label">Tanggal</label>
                                <div class="col-sm-12"><input type="date" class="form-control" id="tanggalEdit" name="tanggal" placeholder="Contoh: 2020/05/03" required></div>
                            </div>
                            <div class="form-group">
                                <label for="keteranganEdit" class="col-sm-12 control-label">Keterangan</label>
                                <div class="col-sm-12"><input type="text" class="form-control" id="keteranganEdit" name="keterangan" placeholder="Contoh: beli barang" required></div>
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
