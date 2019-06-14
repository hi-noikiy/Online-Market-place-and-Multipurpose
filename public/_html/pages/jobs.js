//New code
function searchJob() {
    $('#searchForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: 'POST',
                data: $('#searchForm').serialize(),
                url: baseUrl + "Job/Read?page=" + 1,
                success: function(data) {
                    $('#jobList').html(data);
                }
            });
        }
    })
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

$('#jobMessage').hide();

function createProfile() {
    $('#addForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Job/AddProfile",
                data: $('#addForm').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == "success") {
                        $("#jobMessage").removeClass('alert-danger').addClass('alert-success');
                        $('#addForm')[0].reset();
                    } else {
                        $("#jobMessage").removeClass('alert-success').addClass('alert-danger');
                    }

                    $('#jobMessage').html(response.message);
                    $('#jobMessage').show();
                    $('html, body').animate({
                        scrollTop: $("#addForm").offset().top
                    }, 2000);
                }
            });

        }
    })
}

$("#skills").select2({
    placeholder: 'Select Skills',
    allowClear: true
});

$('#jobMessage').hide();

function saveJob() {
    $('#addForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Job/Publish",
                data: $('#addForm').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == "success") {
                        $("#country").val('').trigger('change');
                        $("#city").val('').trigger('change');
                        $("#skills").val('').trigger('change');
                        $('#addForm')[0].reset();
                        $("#jobMessage").removeClass('alert-danger').addClass('alert-success');
                    } else {
                        $("#jobMessage").removeClass('alert-success').addClass('alert-danger');
                    }

                    $('#jobMessage').html(response.message);
                    $('#jobMessage').show();
                    $('html, body').animate({
                        scrollTop: $("#addForm").offset().top
                    }, 2000);
                }
            });

        }
    })
}

$('#applyJobMessageDiv').hide();

function applyJob() {
    $('#applyJobForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Job/Apply",
                data: $('#applyJobForm').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == "success") {
                        $('#applyJobForm')[0].reset();
                        $("#applyJobMessageDiv").removeClass('alert-danger').addClass('alert-success');
                    } else {
                        $("#applyJobMessageDiv").removeClass('alert-success').addClass('alert-danger');
                    }

                    $('#applyJobMessage').html(response.message);
                    $('#applyJobMessageDiv').show();
                    $('html, body').animate({
                        scrollTop: $("#showMessageDiv").offset().top
                    }, 2000);

                }
            });
        }
    })
}

//######### Job Seeker ###############

//Job seeker applied list
function getJobSeekerAppliedJobs() {
    $('#appliedJobList').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageJobSeekerAppliedJobData(page);
    });
}

function paginageJobSeekerAppliedJobData(page) {
    $.ajax({
        type: 'POST',
        url: baseUrl + "Job/JobSeekerAppliedJobAjax?page=" + page,
        success: function(data) {
            $('#appliedJobList').html(data);
        }
    });
}

//Job seeker match list
function getJobSeekerMatchJobs() {
    $('#matchJobList').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageJobSeekerMatchJobData(page);
    });
}

function paginageJobSeekerMatchJobData(page) {
    $.ajax({
        type: 'POST',
        url: baseUrl + "Job/JobSeekerMatchJobAjax?page=" + page,
        success: function(data) {
            $('#matchJobList').html(data);
        }
    });
}

//Job seeker invitation list
function getJobSeekerInvitationJobs() {
    $('#invitationJobList').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageJobSeekerInvitationJobData(page);
    });
}

function paginageJobSeekerInvitationJobData(page) {
    $.ajax({
        type: 'POST',
        url: baseUrl + "Job/JobSeekerInvitationJobAjax?page=" + page,
        success: function(data) {
            $('#invitationJobList').html(data);
        }
    });
}







//Get pagination data
// $(document).on('click', '.pagination a', function(event) {
//     event.preventDefault();
//     var page = $(this).attr('href').split('page=')[1];
//     paginageData(page);
// });

// function paginageData(page) {
//     $.ajax({
//         type: 'POST',
//         url: baseUrl + "Job/Read?page=" + page,
//         success: function(data) {
//             $('#jobList').html(data);
//         }
//     });
// }

// function addJob() {
//     $('#AddJobForm')[0].reset();
//     $("#AddModal").modal();
// }

// function saveJob() {
//     $('#AddJobForm').validator().on('submit', function(e) {
//         if (e.isDefaultPrevented()) {
//             // handle the invalid form...
//         } else { // everything looks good!
//             e.preventDefault();
//             $.ajax({
//                 type: "POST",
//                 url: baseUrl + "Job/Save",
//                 data: $('#AddJobForm').serialize(),
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

// function editJob(id) {
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
//                 $("#jobType").val(data.job_type);
//                 $("#editEndDate").val(data.end_date);
//                 $("#editLocation").val(data.location);
//                 $("#editJobSalary").val(data.job_price);
//                 $("#publicationStatus").val(data.status);
//                 $("#description").val(data.description);
//                 $("#editModal").modal();
//             } else {
//                 Swal('Error!', response.message, response.status);
//             }
//         }
//     });

// }

// function updateJob() {
//     $('#editJobForm').validator().on('submit', function(e) {
//         if (e.isDefaultPrevented()) {
//             // handle the invalid form...
//         } else { // everything looks good!
//             e.preventDefault();
//             $.ajax({
//                 type: "POST",
//                 url: baseUrl + "Job/Update",
//                 data: $('#editJobForm').serialize(),
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

// function deleteJob(id) {
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
//                 url: baseUrl + "Job/Delete",
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