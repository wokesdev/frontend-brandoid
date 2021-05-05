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
            $('#kodeBarang').trigger('focus');
        });
    });

    $('.edit').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url :"item/"+ id +"/edit",
            dataType:"json",
            beforeSend: function () {
                $('#editModal').modal('show');
                $('#editForm').validate().resetForm();
                $('#editForm').attr('action', "item/" + id);
                $('#editModal').on('shown.bs.modal', function () {
                    $('#kodeBarangEdit').trigger('focus');
                });

                $('#editForm input').attr('disabled', true);
                $('#editButton').prop('disabled', true);
                $('#cancelButton').prop('disabled', true);
            },
            success: function (data) {
                $('#kodeBarangEdit').val(data.kode_barang);
                $('#namaBarangEdit').val(data.nama_barang);
                $('#hargaBeliEdit').val(data.harga_beli);
                $('#hargaJualEdit').val(data.harga_jual);
                $('#stokEdit').val(data.stok);

                $('#editForm input').attr('disabled', false);
                $('#editButton').prop('disabled', false);
                $('#cancelButton').prop('disabled', false);
            }
        });
    });

    $('.delete').click(function () {
        var id = $(this).attr('id');
        swal({
            title: 'Are you sure?',
            text: "This item will be deleted permanently!",
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
                    url: "item/" + id,
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
