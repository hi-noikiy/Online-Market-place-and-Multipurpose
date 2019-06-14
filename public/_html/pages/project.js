//Select2 init
// $("#location").select2();

$("#skills").select2({
    placeholder: 'Select Skills',
    allowClear: true
});

function searchProject() {
    $('#searchForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: 'POST',
                data: $('#searchForm').serialize(),
                url: baseUrl + url[length] + "/Read?page=" + 1, // url[length] comes form project page
                success: function(data) {
                    $('#projectList').html(data);
                }
            });
        }
    });
}


$("#city").prop('disabled', true);

function getCities() {
    var value = $("#country").val();
    html = '<option value="">Select City</option>';
    if (value) {
        $.ajax({
            type: "POST",
            url: baseUrl + "GetCities",
            data: { id: value },
            dataType: 'json',
            success: function(response) {
                if (response.status == "success") {
                    for (var i = 0; i < response.data.length; i++) {
                        html += '<option value="' + response.data[i].id + '">' + response.data[i].name + '</option>';
                    }

                    $("#city").html(html);
                    $("#city").prop('disabled', false);

                } else {
                    $("#city").html(html);
                    $("#city").prop('disabled', true);
                }
            }
        });

    } else {
        $("#country").val('');
        $("#city").html(html);
        $("#city").prop('disabled', true);
    }
}

$('#projectMessage').hide();

function saveProject() {
    $('#addForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Customer/SaveProject",
                data: $('#addForm').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == "success") {
                        $('#addForm')[0].reset();
                        $("#projectMessage").removeClass('alert-danger').addClass('alert-success');
                    } else {
                        $("#projectMessage").removeClass('alert-success').addClass('alert-danger');
                    }

                    $('#projectMessage').html(response.message);
                    $('#projectMessage').show();
                    $('html, body').animate({
                        scrollTop: $("#addForm").offset().top
                    }, 2000);
                }
            });

        }
    })
}










// /*
// #################################################
// ################# Customer ######################
// ################################################
// */

// $("#endDate").dateDropper();
// $("#editEndDate").dateDropper();

// //Get pagination data
// // $(document).on('click', '.pagination a', function(event) {
// //     event.preventDefault();
// //     var page = $(this).attr('href').split('page=')[1];
// //     paginageData(page);
// // });

// // function paginageData(page) {
// //     $.ajax({
// //         type: 'POST',
// //         url: baseUrl + "Customer/Read?page=" + page,
// //         success: function(data) {
// //             $('#projectList').html(data);
// //         }
// //     });
// // }

// function addProject() {
//     $('#AddProjectForm')[0].reset();
//     $("#AddModal").modal();

// }

// function saveProject() {
//     $('#AddProjectForm').validator().on('submit', function(e) {
//         if (e.isDefaultPrevented()) {
//             // handle the invalid form...
//         } else { // everything looks good!
//             e.preventDefault();
//             $.ajax({
//                 type: "POST",
//                 url: baseUrl + "Customer/Store",
//                 data: $('#AddProjectForm').serialize(),
//                 dataType: 'json',
//                 success: function(result) {
//                     $("#AddModal").modal('hide');
//                     if (result.status == "success") {
//                         paginageData();
//                         Swal('Created!', result.message, result.status);
//                     } else {
//                         Swal('Error!', result.message, result.status);
//                     }
//                 }
//             });

//         }
//     })
// }

// function editProject(id) {
//     $('#editProjectForm')[0].reset();
//     $.ajax({
//         type: "GET",
//         url: baseUrl + "Customer/SingleRow",
//         data: { id: id },
//         dataType: 'json',
//         success: function(response) {
//             if (response.status == "success") {
//                 //Assign data
//                 var data = response.data;
//                 $("#id").val(data.id);
//                 $("#jobTitle").val(data.title);
//                 $("#jobCat").val(data.category_id);
//                 $("#freelancerType").val(data.freelancer_type);
//                 $("#editEndDate").val(data.end_date);
//                 $("#editLocation").val(data.location);
//                 $("#editJobPrice").val(data.job_price);
//                 $("#publicationStatus").val(data.status);
//                 $("#description").val(data.description);
//                 $("#editModal").modal();
//             } else {
//                 Swal('Error!', response.message, response.status);
//             }
//         }
//     });

// }

// function updateProject() {
//     $('#editProjectForm').validator().on('submit', function(e) {
//         if (e.isDefaultPrevented()) {
//             // handle the invalid form...
//         } else { // everything looks good!
//             e.preventDefault();
//             $.ajax({
//                 type: "POST",
//                 url: baseUrl + "Customer/Update",
//                 data: $('#editProjectForm').serialize(),
//                 dataType: 'json',
//                 success: function(result) {
//                     $("#editModal").modal('hide');
//                     if (result.status == "success") {
//                         paginageData();
//                         Swal('Created!', result.message, result.status);
//                     } else {
//                         Swal('Error!', result.message, result.status);
//                     }
//                 }
//             });

//         }
//     })

// }

// function deleteProject(id) {
//     Swal({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//         if (result.value) {
//             $.ajax({
//                 type: "GET",
//                 url: baseUrl + "Customer/Delete",
//                 data: { id: id },
//                 dataType: 'json',
//                 success: function(result) {
//                     if (result.status == "success") {
//                         paginageData();
//                         Swal('Deleted!', result.message, result.status);
//                     } else {
//                         Swal('Error!', result.message, result.status);
//                     }
//                 }
//             });

//         }
//     })

// }