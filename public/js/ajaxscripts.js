
function edit(id) {
    $.ajax({
        url: "/admin/editUser",
        method: "post",
        data: { "_token": $('meta[name="csrf-token"]').attr('content'), id: id },
        success: function success(data) {
            $('#user-detail').html(data);
            $('#edit-item').modal("show");
        }
    });
}

function update() {
    $.ajax({

        url: "/admin/updateUser",
        method: "post",
        data: $('#edit-form').serialize(),
        success: function (data) {
            $('#edit-item').modal("hide");
            location.reload();
        }
    });

}