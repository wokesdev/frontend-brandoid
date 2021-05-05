<script>
$(document).ready(function () {
    $('#filterButtonLR').click(function () {
        $('#printFormLR').trigger("reset");
        $('#printFormLR').validate().resetForm();
        $('#printModalLR').on('shown.bs.modal', function () {
            $('#fromDateLR').trigger('focus');
        });
    });
});
</script>
