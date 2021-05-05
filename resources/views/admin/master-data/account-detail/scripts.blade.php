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
            url :"coa-detail/"+ id +"/edit",
            dataType:"json",
            beforeSend: function () {
                $('#editModal').modal('show');
                $('#editForm').validate().resetForm();
                $('#editForm').attr('action', "coa-detail/" + id);
                $('#editModal').on('shown.bs.modal', function () {
                    $('#coaIdEdit').trigger('focus');
                });

                $('#editForm input').attr('disabled', true);
                $('#editForm select').attr('disabled', true);
                $('#editButton').prop('disabled', true);
                $('#cancelButton').prop('disabled', true);
            },
            success: function (data) {
                $('#coaIdEdit').val(data.chart_of_account_id);
                $('#namaRincianAkunEdit').val(data.nama_rincian_akun);

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
            text: "Chart of account's detail will be deleted permanently!",
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
                    url: "coa-detail/" + id,
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
