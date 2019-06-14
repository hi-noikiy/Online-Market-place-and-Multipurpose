//Admin area
function getCountries() {
    var datatable = $('#category-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        ajax: {
            "url": baseUrl + "Admin/GetCountries",
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

function addCountry() {
    $("#messageDiv").hide();
    $('#addForm')[0].reset();
    $("#addModal").modal()
}

function saveCountry() {
    $('#addForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Admin/SaveCountry",
                data: $('#addForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#addModal").modal('hide');
                        $("#messageDiv").hide();
                        getCountries();
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

function editCountry(id) {
    $("#messageDivUpdate").hide();
    $('#updateForm')[0].reset();
    $.ajax({
        type: "POST",
        url: baseUrl + "Admin/GetCountry",
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

function updateCountry() {
    $('#updateForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Admin/UpdateCountry",
                data: $('#updateForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#updateModal").modal('hide');
                        getCountries();
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

function deleteCountry(id) {
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
                url: baseUrl + "Admin/DeleteCountry",
                data: { id: id },
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        getCountries();
                        swal("Deleted!", result.message, result.status);
                    } else {
                        swal("Error!", result.message, result.status);
                    }
                }
            });
        });
}