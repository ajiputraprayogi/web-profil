function editdata(kode) {
    $.ajax({
        type: 'GET',
        url: '/backend/permissions/' + kode + '/edit',
        success: function (role) {
            $('#editform').attr('action', '/backend/permissions/' + role.id);
            $('#permission').val(role.name);
            $('#permission_grup').val(role.permission_grup)
            $('#modal-edit').modal('show');
        }, complete: function () {
        },
        error: function () {
            swalWithBootstrapButtons.fire(
                'Oops!',
                'Edit Failed',
                'error'
            )
        }
    });
}
// ============================================================
function hapusdata(kode) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
    })
    swalWithBootstrapButtons.fire({
        title: 'Hapus Data ?',
        text: "Data tidak dapat di pulihkan kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Tidak',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'DELETE',
                url: '/backend/permissions/' + kode,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function () {
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    location.reload()
                    // $('#list-data').DataTable().ajax.reload();
                },
                error: function () {
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Delete failed',
                        'error'
                    )
                    location.reloa();
                    // $('#list-data').DataTable().ajax.reload();
                }
            });
        }
    })
}
window.hapusdata = hapusdata;
