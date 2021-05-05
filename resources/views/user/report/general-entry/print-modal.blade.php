<div class="modal fade" id="printModal" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="printModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="titleModal">Cetak Jurnal Umum</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="modal-body">
                <form id="printForm" name="printForm" class="form-horizontal" autocomplete="off" action="{{ route('user.general-entry.print') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="fromDate" class="col-sm-12 control-label">Dari Tanggal</label>
                                <div class="col-sm-12"><input type="date" class="form-control" id="fromDate" name="from_date" placeholder="Contoh: 2020/05/03" required></div>
                            </div>
                            <div class="form-group">
                                <label for="toDate" class="col-sm-12 control-label">Hingga Tanggal</label>
                                <div class="col-sm-12"><input type="date" class="form-control" id="toDate" name="to_date" placeholder="Contoh: 2020/05/03" required></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="printButton" form="printForm">Cetak</button>
            </div>
        </div>
    </div>
</div>
