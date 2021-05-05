<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $('#createButton').click(function () {
        getItemFirst();

        $('#createForm').trigger("reset");
        $('#createForm').validate().resetForm();
        $('#createModal').on('shown.bs.modal', function () {
            $('#coaId').trigger('focus');
        });
    });

    $('.show-detail').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url: 'sale/' + id,
            type: 'GET',
            beforeSend: function () {
                $('#detailModal').modal('show');
            },
            success: function (data) {
                $('.header-text').text('Di bawah ini adalah rincian penjualan untuk nomor penjualan ' + data['sale']['nomor_penjualan'] + ':');
                $('.tbody-detail').html(data['tbody']);
            }
        });
    });

    $('.edit').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url :"sale/"+ id +"/edit",
            type: "GET",
            dataType:"json",
            beforeSend: function () {
                $('#editModal').modal('show');
                $('#editForm').validate().resetForm();
                $('#editForm').attr('action', "sale/" + id);
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
                $('#coaPaymentIdEdit').val(data.coa_detail_payment_id);
                $('#tanggalEdit').val(data.tanggal);
                $('#keteranganEdit').val(data.keterangan);

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
            text: "Linked sale's details will also be deleted!",
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
                    url: "sale/" + id,
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

    function getItemFirst () {
        $.ajax({
            url: "get-item",
            type: "GET",
            dataType: "json",
            beforeSend: function ()
            {
                $('#detailField').html('');
                addDynamicField(1);

                $('#barang1').prop('disabled', true);
                $('#kuantitas1').prop('disabled', true);
                $('#harga_satuan1').prop('disabled', true);
            },
            success: function(data){
                var html = '<option value="" disabled selected>Pilih Barang</option>';

                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id + '>' + data[i].nama_barang + '</option>';
                }

                $('.barang').html(html);

                $('#barang1').prop('disabled', false);
                $('#kuantitas1').prop('disabled', false);
                $('#harga_satuan1').prop('disabled', false);
            }
        });
    }

    var count = 1;
    function addDynamicField (count) {
        var button = '';
        if (count > 1) {
            button = '<button type="button" name="remove" id="' + count + '" class="btn btn-danger btn-xs remove">x</button>';
        } else {
            button = '<button type="button" name="add-input" id="addInput" class="btn btn-success btn-xs ml-auto">+</button>';
        }

        output = '<div id="row' + count + '">';

            output += '<div class="form-group">';
                output += '<label for="barang" class="col-sm-12 control-label">Barang</label>';
                output += '<div class="col-sm-12 input-group w-100">'
                    output += '<select class="form-control barang" id="barang' + count + '" name="barang[]" required></select>'
                    output += '<div class="input-group-append">' + button + '</div>'
                output += '</div>'
            output += '</div>';

            output += '<div class="form-group">';
                output += '<label for="kuantitas" class="col-sm-12 control-label">Kuantitas</label>';
                output += '<div class="col-sm-12">'
                    output += '<input type="number" class="form-control input' + count + ' kuantitas" id="kuantitas' + count + '" name="kuantitas[]" placeholder="Contoh: 5" required>'
                output += '</div>'
            output += '</div>';

            output += '<div class="form-group">';
                output += '<label for="harga_satuan" class="col-sm-12 control-label">Harga Satuan</label>';
                output += '<div class="col-sm-12 input-group w-100">'
                    output += '<div class="input-group-prepend">'
                        output += '<span class="input-group-text">Rp</span>'
                    output += '</div>'
                    output += '<input type="number" class="form-control input' + count + ' harga_satuan" id="harga_satuan' + count + '" name="harga_satuan[]" placeholder="Contoh: 50.000" required>'
                output += '</div>'
            output += '</div>';

            output += '<div class="form-group">';
                output += '<label for="subtotal" class="col-sm-12 control-label">Subtotal</label>';
                output += '<div class="col-sm-12 input-group w-100">'
                    output += '<div class="input-group-prepend">'
                    output += '<span class="input-group-text">Rp</span></div>'
                    output += '<input type="number" class="form-control subtotal" id="subtotal' + count + '" name="subtotal[]" placeholder="0" readonly>'
                output += '</div>'
            output += '</div>';

            output += '<hr class="mt-3 mb-3 bg-dark">'

        output += '</div>';

        $('#detailField').append(output);

        $(".input" + count).on("keyup", function () {
            var val = parseInt($("#kuantitas" + count).val()) * parseInt($("#harga_satuan" + count).val());

            $("#subtotal" + count).val(val);
        });

        $(".input" + count).on("change", function () {
            var val = parseInt($("#kuantitas" + count).val()) * parseInt($("#harga_satuan" + count).val());

            $("#subtotal" + count).val(val);
        });

        $("#barang" + count).change(function () {
            var id = $('#barang' + count).val();
            $.ajax({
                url :"item/"+ id + "/edit",
                type: 'GET',
                dataType:"json",
                beforeSend: function()
                {
                    $('#kuantitas' + count).prop('disabled', true);
                    $('#harga_satuan' + count).prop('disabled', true);
                },
                success: function(data)
                {
                    $('#harga_satuan' + count).val(data.harga_jual);

                    var val = parseInt($("#kuantitas" + count).val()) * parseInt($("#harga_satuan" + count).val());

                    $("#subtotal" + count).val(val);
                    $('#kuantitas' + count).prop('disabled', false);
                    $('#harga_satuan' + count).prop('disabled', false);
                },
            });
        });

        $(".kuantitas").keyup(function () {
            var total = 0;

            $('.subtotal').each(function () {
                total = total + parseInt($(this).val());
            });

            $("#total").val(total);
        });

        $(".harga_satuan").keyup(function () {
            var total = 0;

            $('.subtotal').each(function () {
                total = total + parseInt($(this).val());
            });

            $("#total").val(total);
        });

        $(".kuantitas").change(function () {
            var total = 0;

            $('.subtotal').each(function () {
                total = total + parseInt($(this).val());
            });

            $("#total").val(total);
        });

        $(".harga_satuan").change(function () {
            var total = 0;

            $('.subtotal').each(function () {
                total = total + parseInt($(this).val());
            });

            $("#total").val(total);
        });
    }

    $(document).on('click', '#addInput', function () {
        count = count + 1;

        addDynamicField(count);

        $.ajax({
            url: "get-item",
            type: "GET",
            dataType: "json",
            beforeSend: function ()
            {
                $('#barang' + count).prop('disabled', true);
                $('#kuantitas' + count).prop('disabled', true);
                $('#harga_satuan' + count).prop('disabled', true);
            },
            success: function(data){
                var html = '<option value="" disabled selected>Pilih Barang</option>';

                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id + '>' + data[i].nama_barang + '</option>';
                }

                $('#barang' + count).html(html);

                $('#barang' + count).prop('disabled', false);
                $('#kuantitas' + count).prop('disabled', false);
                $('#harga_satuan' + count).prop('disabled', false);
            }
        });
    });

    $(document).on('click', '.remove', function () {
        var row_id = $(this).attr("id");

        $('#row' + row_id).remove();
    });
});
</script>
