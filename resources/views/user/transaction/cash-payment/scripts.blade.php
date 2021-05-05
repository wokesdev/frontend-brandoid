<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $('#createButton').click(function () {
        $('#createForm').trigger("reset");
        $('#createForm').validate().resetForm();
        $('#createModal').on('shown.bs.modal', function () {
            $('#coaId').trigger('focus');
        });
    });

    $('.edit').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url :"cash-payment/"+ id +"/edit",
            type: "GET",
            dataType:"json",
            beforeSend: function () {
                $('#editModal').modal('show');
                $('#editForm').validate().resetForm();
                $('#editForm').attr('action', "cash-payment/" + id);
                $('#editModal').on('shown.bs.modal', function () {
                    $('#coaIdEdit').trigger('focus');
                });

                $('#editForm input').attr('disabled', true);
                $('#editForm select').attr('disabled', true);
                $('#editButton').prop('disabled', true);
                $('#cancelButton').prop('disabled', true);
            },
            success: function (data) {
                $('#coaIdEdit').val(data.coa_detail_id);
                $('#tanggalEdit').val(data.tanggal);
                $('#keteranganEdit').val(data.keterangan);
                $('#nominalEdit').val(data.nominal);

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
            text: "This cash payment will be deleted permanently!",
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
                    url: "cash-payment/" + id,
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
