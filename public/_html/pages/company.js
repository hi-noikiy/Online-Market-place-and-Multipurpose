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

$('#companyMessage').hide();

function createProfile() {
    $('#addForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Job/AddCompany",
                data: $('#addForm').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == "success") {
                        $("#freelancerMessage").removeClass('alert-danger').addClass('alert-success');
                    } else {
                        $("#freelancerMessage").removeClass('alert-success').addClass('alert-danger');
                    }

                    $('#freelancerMessage').html(response.message);
                    $('#freelancerMessage').show();
                    $('html, body').animate({
                        scrollTop: $("#addForm").offset().top
                    }, 2000);
                }
            });

        }
    })
}

// Job history list
function getCompanyJobHistory() {
    $('#jobHistoryList').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageCompanyJobHistoryData(page);
    });
}

function paginageCompanyJobHistoryData(page) {
    $.ajax({
        type: 'POST',
        url: baseUrl + "Compay/JobHistoryAjax?page=" + page,
        success: function(data) {
            $('#jobHistoryList').html(data);
        }
    });
}

// Applied job list
function getCompanyAppliedJob() {
    $('#appliedJobList').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageCompanyAppliedJobListData(page);
    });
}

function paginageCompanyAppliedJobListData(page) {
    $.ajax({
        type: 'POST',
        url: baseUrl + "Compay/AppliedJobAjax?page=" + page,
        success: function(data) {
            $('#appliedJobList').html(data);
        }
    });
}

// Company invitation job list
function getCompanyInvitationJob() {
    $('#invitationJobList').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageCompanyInvitationJobListData(page);
    });
}

function paginageCompanyInvitationJobListData(page) {
    $.ajax({
        type: 'POST',
        url: baseUrl + "Compay/InvitationJobAjax?page=" + page,
        success: function(data) {
            $('#invitationJobList').html(data);
        }
    });
}