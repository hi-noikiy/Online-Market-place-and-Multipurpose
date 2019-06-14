//#### Admin area ###

function getCategories() {
    var datatable = $('#category-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        ajax: {
            "url": baseUrl + "Admin/GetCategories",
            "type": "POST"
        },
        columns: [
            { data: 'rownum', name: 'rownum' },
            { data: 'name', name: 'name' },
            { data: 'slug', name: 'slug' },
            { data: 'icon', name: 'icon' },
            { data: 'type', name: 'type' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}

function addCategory() {
    $("#messageDiv").hide();
    $('#addForm')[0].reset();
    $("#addModal").modal()
}

function saveCategory() {
    $('#addForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Admin/SaveCategory",
                data: $('#addForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#addModal").modal('hide');
                        $("#messageDiv").hide();
                        getCategories();
                        swal("Saved!", result.message, result.status);

                    } else {
                        $("#message").html(result.message);
                        $("#messageDiv").show();

                    }
                }
            });

        }
    })
}

function editCategory(id) {
    $("#messageDivUpdate").hide();
    $('#updateForm')[0].reset();
    $.ajax({
        type: "POST",
        url: baseUrl + "Admin/GetCategory",
        data: { id: id },
        dataType: 'json',
        success: function(result) {
            if (result.status == "success") {
                var data = result.data;
                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#slug").val(data.slug);
                $("#icon").val(data.icon);
                $("#type").val(data.type);
                $("#status").val(data.status);
                $("#updateModal").modal();
            } else {
                swal("Error!", result.message, result.status);
            }
        }
    });
}

function updateCategory() {
    $('#updateForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Admin/UpdateCategory",
                data: $('#updateForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#updateModal").modal('hide');
                        getCategories();
                        swal("Updated!", result.message, result.status);

                    } else {
                        $("#messageUpdate").html(result.message);
                        $("#messageDivUpdate").show();
                    }
                }
            });
        }
    })
}

function deleteCategory(id) {
    swal({
            title: "Are you sure?",
            text: "Do You Want to Delete?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false
        },
        function() {
            $.ajax({
                type: "POST",
                url: baseUrl + "Admin/DeleteCategory",
                data: { id: id },
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        getCategories();
                        swal("Updated!", result.message, result.status);
                    } else {
                        swal("Error!", result.message, result.status);
                    }
                }
            });
        });
}