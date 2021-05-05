<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $('#filterButton').click(function () {
        $('#printForm').trigger("reset");
        $('#printForm').validate().resetForm();
        $('#printModal').on('shown.bs.modal', function () {
            $('#fromDate').trigger('focus');
        });
    });

    $('#createButton').click(function () {
        $('#createForm').trigger("reset");
        $('#createForm').validate().resetForm();
        $('#createModal').on('shown.bs.modal', function () {
            $('#coaDebitId').trigger('focus');
        });
    });

    $('.show-detail').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url: 'general-entry/' + id,
            type: 'GET',
            beforeSend: function () {
                $('#detailModal').modal('show');
            },
            success: function (data) {
                $('.header-text').text('Di bawah ini adalah rincian jurnal umum untuk nomor transaksi ' + data['general_entry']['nomor_transaksi'] + ':');
                $('.tbody-detail').html(data['tbody']);
            }
        });
    });

    $('.edit').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url :"general-entry/"+ id +"/edit",
            type: "GET",
            dataType:"json",
            beforeSend: function () {
                $('#editModal').modal('show');
                $('#editForm').validate().resetForm();
                $('#editForm').attr('action', "general-entry/" + id);
                $('#editModal').on('shown.bs.modal', function () {
                    $('#coaDebitIdEdit').trigger('focus');
                });

                $('#editForm input').attr('disabled', true);
                $('#editForm select').attr('disabled', true);
                $('#editButton').prop('disabled', true);
                $('#cancelButton').prop('disabled', true);
            },
            success: function (data) {
                $('#coaDebitIdEdit').val(data.general_entry_details[0].coa_detail_id);
                $('#coaKreditIdEdit').val(data.general_entry_details[1].coa_detail_id);
                $('#tanggalEdit').val(data.tanggal);
                $('#keteranganEdit').val(data.keterangan);
                $('#nominalEdit').val(data.general_entry_details[0].debit);

                $('#editForm input').attr('disabled', false);
                $('#editForm select').attr('disabled', false);
                $('#editButton').prop('disabled', false);
                $('#cancelButton').prop('disabled', false);
            }
        });
    });

    $('.delete').click(function () {
        var id = $(this).attr('id');
        swal({
            title: 'Are you sure?',
            text: "Linked general entry's details will also be deleted!",
            icon: 'warning',
            buttons:{
                confirm: {
                    text: 'Yes, of course!',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'Forget it!',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "general-entry/" + id,
                    type: 'DELETE',
                    success: function (data) {
                        window.location.reload();
                    },
                    error: function (data) {
                        window.location.reload();
                    }
                });
            };
        });
    });
});
</script>
