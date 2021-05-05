<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $('.make-admin').click(function () {
        var id = $(this).attr('id');
        swal({
            title: 'Are you sure?',
            text: "This user will become admin and got access to all administrator stuff!",
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
                    url: "user-make-admin/" + id,
                    type: 'PUT',
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

    $('.remove-admin').click(function () {
        var id = $(this).attr('id');
        swal({
            title: 'Are you sure?',
            text: "This user will be removed as admin and no longer got access to all administrator stuff!",
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
                    url: "user-remove-admin/" + id,
                    type: 'PUT',
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

    $('.ban-user').click(function () {
        var id = $(this).attr('id');
        swal({
            title: 'Are you sure?',
            text: "This user will be banned and his/her account can't be used anymore!",
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
                    url: "user-ban-user/" + id,
                    type: 'PUT',
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

    $('.unban-user').click(function () {
        var id = $(this).attr('id');
        swal({
            title: 'Are you sure?',
            text: "This user will be unbanned and his/her account can be used again!",
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
                    url: "user-unban-user/" + id,
                    type: 'PUT',
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
