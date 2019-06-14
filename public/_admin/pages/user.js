//Run function
getUsers();


function getUsers() {
    var datatable = $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        destroy: true,
        ajax: {
            "url":baseUrl + "GetUsers",
            "type": "POST"
        },
        columns: [
            { data: 'rownum', name: 'rownum' },
            { data: 'name', name: 'name' },
            { data: 'mobile', name: 'mobile' },
            { data: 'email', name: 'email' },
            { data: 'user_type', name: 'user_type' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
            
        ]
    });   
}

function editUser(id) {
    $("#messageDivUpdate").hide();
    $('#updateForm')[0].reset();
    $.ajax({
        type: "POST",
        "url":baseUrl + "GetUser",
        data: { id: id },
        dataType: 'json',
        success: function(result) {        	
            if (result.status == "success") {
                var data = result.data;
                $("#id").val(data.id);
                $("#name").val(data.name);                
                $("#mobile").val(data.mobile);                
                $("#email").val(data.email);                
                $("#user_type").val(data.user_type);                
                $("#status").val(data.status);                
                $("#updateModal").modal();
            } else {
                swal("Error!", result.message, result.status);
            }
        }
    });
}

function updateUser() {
    $('#updateForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "UpdateUser",
                data: $('#updateForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#updateModal").modal('hide');
                        getUsers();
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

function deleteUser(id) {
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
                url: baseUrl + "DeleteUser",
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