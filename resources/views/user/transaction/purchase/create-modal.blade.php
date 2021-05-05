<div class="modal fade" id="createModal" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="titleModal">Tambah Pembelian</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <form id="createForm" name="createForm" class="form-horizontal" autocomplete="off" action="{{ route('user.purchase.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div id="mainField" class="col-sm-6">
                            <div class="form-group">
                                <label for="coaId" class="col-sm-12 control-label">Akun Pembelian</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="coaId" name="rincian_akun" required>
                                        <option value="" disabled selected>Pilih Akun</option>
                                        @foreach ($coas as $coa)
                                            <option value="{{ $coa['id'] }}">{{ $coa['nomor_rincian_akun'] }} - {{ $coa['nama_rincian_akun'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="coaPaymentId" class="col-sm-12 control-label">Akun Pembayaran</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="coaPaymentId" name="rincian_akun_pembayaran" required>
                                        <option value="" disabled selected>Pilih Akun</option>
                                        @foreach ($coas as $coa)
                                            <option value="{{ $coa['id'] }}">{{ $coa['nomor_rincian_akun'] }} - {{ $coa['nama_rincian_akun'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-sm-12 control-label">Tanggal</label>
                                <div class="col-sm-12"><input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Contoh: 2020/05/03" required></div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-sm-12 control-label">Keterangan</label>
                                <div class="col-sm-12"><input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Contoh: beli barang" required></div>
                            </div>
                            <div class="form-group" id="totalField">
                                <label for="total" class="col-sm-12 control-label">Total</label>
                                <div class="col-sm-12 input-group w-100"><div class="input-group-prepend"><span class="input-group-text">Rp</span></div><input type="number" class="form-control total" id="total" name="total" placeholder="0" readonly></div>
                            </div>
                        </div>
                        <div id="detailField" class="col-sm-6"></div>
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
