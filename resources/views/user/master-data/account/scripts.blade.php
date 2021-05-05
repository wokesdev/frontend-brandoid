<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $('.show-detail').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url: 'coa/' + id,
            type: 'GET',
            beforeSend: function () {
                $('#detailModal').modal('show');
            },
            success: function (data) {
                $('.header-text').text('Di bawah ini adalah rincian akun untuk ' + data['coa']['nama_akun'] + ' (' + data['coa']['nomor_akun'] + '):');
                $('#tbody-detail').html(data['tbody']);
            }
        });
    });
});
</script>
