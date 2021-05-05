<div class="modal fade" id="createModal" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="titleModal">Tambah Jurnal Umum</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <form id="createForm" name="createForm" class="form-horizontal" autocomplete="off" action="{{ route('user.general-entry.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="coaDebitId" class="col-sm-12 control-label">Akun Debit</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="coaDebitId" name="rincian_akun_debit" required>
                                        <option value="" disabled selected>Pilih Akun</option>
                                        @foreach ($coas as $coa)
                                            <option value="{{ $coa['id'] }}">{{ $coa['nomor_rincian_akun'] }} - {{ $coa['nama_rincian_akun'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="coaKreditId" class="col-sm-12 control-label">Akun Kredit</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="coaKreditId" name="rincian_akun_kredit" required>
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
                                <div class="col-sm-12"><input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Contoh: lain-lain" required></div>
                            </div>
                            <div class="form-group">
                                <label for="nominal" class="col-sm-12 control-label">Nominal</label>
                                <div class="col-sm-12 input-group w-100">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Contoh: 50.000" required>
                                </div>
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
