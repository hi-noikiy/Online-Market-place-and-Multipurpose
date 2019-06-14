$("#city").prop('disabled', true);

function getCities(cityId) {
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
                        //Selected value assign                        
                        if (cityId) {
                            if (parseInt(response.data[i].id) == parseInt(cityId)) {
                                selected = "selected";
                            } else {
                                var selected = null;
                            }
                        }

                        html += '<option value="' + response.data[i].id + '" ' + selected + '>' + response.data[i].name + '</option>';
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







//OLd
function updateUser() {
    $('#userUpdateForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Customer/UpdateProfile",
                data: $('#userUpdateForm').serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.status == "success") {
                        $("#name").val(result.data.name);
                        $("#mobile").val(result.data.mobile);
                        $("#email").val(result.data.email);
                        $("#gender").val(result.data.gender);
                        $("#physical_add").val(result.data.physical_add);
                        Swal('Updated!', result.message, result.status);
                    } else {
                        Swal('Error!', result.message, result.status);
                    }
                }
            });

        }
    })
}