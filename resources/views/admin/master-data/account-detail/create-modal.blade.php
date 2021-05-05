<div class="modal fade" id="createModal" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="titleModal">Tambah Rincian Akun</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <form id="createForm" name="createForm" class="form-horizontal" autocomplete="off" action="{{ route('admin.coa-detail.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="coaId" class="col-sm-12 control-label">Akun</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="coaId" name="coa_id" required>
                                        <option value="" disabled selected>Pilih Akun</option>
                                        @foreach ($coas as $coa)
                                            <option value="{{ $coa['id'] }}">{{ $coa['nomor_akun'] }} - {{ $coa['nama_akun'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namaRincianAkun" class="col-sm-12 control-label">Nama Rincian Akun</label>
                                <div class="col-sm-12"><input type="text" class="form-control" id="namaRincianAkun" name="nama_rincian_akun" placeholder="Contoh: Kas" required></div>
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
