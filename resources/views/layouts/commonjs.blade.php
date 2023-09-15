<script>
    function showToast(type, css, msg) {
        var t = {
            type: type,
            css: css,
            msg: msg
        };
        toastr.options.positionClass = t.css;
        toastr[t.type](t.msg);
    }

    var sucesstoast = '{{ Session::get('success') }}';
    if (sucesstoast) {
        showToast('success', 'toast-top-right', sucesstoast);
    }

    var warningtoast = '{{ Session::get('warning') }}';
    if (warningtoast) {
        showToast('warning', 'toast-top-right', warningtoast);
    }

    var errortoast = '{{ Session::get('error') }}';
    if (errortoast) {
        showToast('error', 'toast-top-right', errortoast);
    }

    $('.delete-record').click(function() {
        var urlname = $(this).attr('data-name');
        Swal.fire({
            title: "<h6>Are you sure you want to delete this record? <br />This action cannot be undone!</h6>",
            icon: "warning",
            allowOutsideClick: false,
            confirmButtonText: "Ok",
            showDenyButton: true,
            denyButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = urlname;
            }
        });
    })
</script>
