//Admin area
function getQualifications() {
    var datatable = $('#qualifications-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        ajax: {
            "url": baseUrl + "Admin/GetQualifications",
            "type": "POST"
        },
        columns: [
            { data: 'rownum', name: 'rownum' },
            { data: 'name', name: 'name' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}

function addQualification() {
    $("#messageDiv").hide();
    $('#addForm')[0].reset();
    $("#addModal").modal()
}

function saveQualification() {
    $('#addForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Admin/SaveQualification",
                data: $('#addForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#addModal").modal('hide');
                        $("#messageDiv").hide();
                        getQualifications();
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

function editQualification(id) {
    $("#messageDivUpdate").hide();
    $('#updateForm')[0].reset();
    $.ajax({
        type: "POST",
        url: baseUrl + "Admin/GetQualification",
        data: { id: id },
        dataType: 'json',
        success: function(result) {
            if (result.status == "success") {
                var data = result.data;
                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#status").val(data.status);
                $("#updateModal").modal();
            } else {
                swal("Error!", result.message, result.status);
            }
        }
    });
}

function updateQualification() {
    $('#updateForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Admin/UpdateQualification",
                data: $('#updateForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#updateModal").modal('hide');
                        getQualifications();
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

function deleteQualification(id) {
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
                url: baseUrl + "Admin/DeleteQualification",
                data: { id: id },
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        getQualifications();
                        swal("Deleted!", result.message, result.status);
                    } else {
                        swal("Error!", result.message, result.status);
                    }
                }
            });
        });
}