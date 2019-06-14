$('#country').select2({
    placeholder: "Select a country",
    allowClear: true
});
$('#city').select2({
    placeholder: "Select a city",
    allowClear: true
});

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


//Hide message div
$("#loginMessage").hide();

function login() {
    $('#loginForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "CheckLogin",
                data: $('#loginForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    console.log(result.message);
                    if (result.status == "success") {
                        $("#loginMessage").hide();
                        window.location.href = baseUrl + "Dashboard";
                    } else {
                        $("#loginMessage").html(result.message);
                        $("#loginMessage").removeClass('alert-success').addClass('alert-danger');
                        $("#loginMessage").show();

                    }
                }
            });

        }
    })
}


$('#loginMessageDiv').hide();

function loginCheck() {
    $('#loginCheckForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "CheckLogin",
                data: $('#loginCheckForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#loginMessageDiv").hide();
                        window.location.href = baseUrl + "Dashboard";
                    } else {
                        $("#message").html(result.message);
                        $("#loginMessageDiv").removeClass('alert-success').addClass('alert-danger');
                        $("#loginMessageDiv").show();

                    }
                }
            });

        }
    })
}

$("#registerMessDiv").hide();

function signupModal() {
    $("#registerMessDiv").hide();
    $('#loginForm')[0].reset();
    // $('#signupForm')[0].reset();
    $("#signup").modal();

}

/*
-----------------------------
        added by saddam
-----------------------------
*/
function editProfileModal() {
    $("#editProfile").modal();
}

function saveChanges(id) {
    $('#updateProfile').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Customer/UpdateProfile",
                data: $('#updateProfile').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#messageDiv").hide();
                        window.location.href = baseUrl + "Dashboard";
                    } else {
                        $("#message").html(result.message);
                        $("#messageDiv").show();

                    }
                }
            });

        }
    })

}
/* saddam */

$("#subType").hide();

function changeType() {
    var value = $("#type").val();
    if (value == 2 || value == 3) {
        $("#subType").show();
    } else {
        $("#subType").hide();
    }
}

function register() {
    $('#signupForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            //Handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Register",
                data: $('#signupForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == 'success') {
                        $('#signupForm')[0].reset();
                        $("#registerMessDiv").removeClass("alert-danger").addClass("alert-success");
                    } else {
                        $("#registerMessDiv").removeClass("alert-success").addClass("alert-danger");
                    }

                    $("#registerMess").html(result.message);
                    $("#registerMessDiv").show();
                }
            });
        }
    })
}

function verify() {
    $('#verifyForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            //Handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            var param = {
                code: $("#code").val(),
                key: '{{Request::segment(2)}}'
            };
            $.ajax({
                type: "GET",
                url: baseUrl + "VerifyCode",
                data: param,
                dataType: 'json',
                success: function(result) {
                    if (result.status == 'success') {
                        $("#content").show();
                        $("#conformationModal").modal('hide');
                    } else {
                        $("#conformationMessageDiv").removeClass("alert-success").addClass("alert-danger");
                        $("#conformationMessage").html(result.message);
                        $("#conformationMessageDiv").show();
                    }
                }
            });
        }
    })
}

function getSubUserType() {
    var value = $("#userType").val();
    if (value == 2 || value == 3) {
        $("#userSubType").prop('required', true);
        $("#userTypeStatus").show();
    } else {
        //Remove Requried att
        $("#userSubType").prop('required', false);
        $("#companyName").prop('required', false);
        $("#companyType").prop('required', false);
        $("#companyCategory").prop('required', false);
        $("#companyDes").prop('required', false);
        //Remove value
        $("#userSubType").val('');
        $("#companyName").val('');
        $("#companyType").val('');
        $("#companyCategory").val('');
        $("#companyDes").val('');

        $("#userTypeStatus").hide();
        $("#userSubTypeStatus").hide();
    }
}

function getSubUserSubType() {
    var value = $("#userSubType").val();
    if (value == 1) {
        //Add Requried att
        $("#companyName").prop('required', true);
        $("#companyType").prop('required', true);
        $("#companyCategory").prop('required', true);
        $("#companyDes").prop('required', true);

        $("#userSubTypeStatus").show();
    } else {
        //Remove Requried att
        $("#companyName").prop('required', false);
        $("#companyType").prop('required', false);
        $("#companyCategory").prop('required', false);
        $("#companyDes").prop('required', false);
        //Remove value
        $("#companyName").val('');
        $("#companyType").val('');
        $("#companyCategory").val('');
        $("#companyDes").val('');

        $("#userSubTypeStatus").hide();
    }
}

function createUserAccount() {
    $('#createUserAccountForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            //Handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "CreateUserAccount",
                data: $("#createUserAccountForm").serializeArray(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == 'success') {
                        Swal('Created!', result.message, result.status);
                        setTimeout(function() {
                            window.location.href = baseUrl;
                        }, 5000);
                    } else {
                        Swal('Error!', result.message, result.status);
                    }
                }
            });
        }
    })

}