<div class="modal fade" id="editModal" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="titleModal">Edit Rincian Akun</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <form id="editForm" name="editForm" class="form-horizontal" autocomplete="off" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="coaIdEdit" class="col-sm-12 control-label">Akun</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="coaIdEdit" name="coa_id" required>
                                        <option value="" disabled selected>Pilih Akun</option>
                                        @foreach ($coas as $coa)
                                            <option value="{{ $coa['id'] }}">{{ $coa['nomor_akun'] }} - {{ $coa['nama_akun'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namaRincianAkunEdit" class="col-sm-12 control-label">Nama Rincian Akun</label>
                                <div class="col-sm-12"><input type="text" class="form-control" id="namaRincianAkunEdit" name="nama_rincian_akun" placeholder="Contoh: Kas" required></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelButton" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="editButton" value="edit" form="editForm">Submit</button>
            </div>
        </div>
    </div>
</div>
