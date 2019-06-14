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


$('#proMessage').hide();

function createProfile() {
    $('#addForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Pro/AddProfile",
                data: $('#addForm').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == "success") {
                        $("#proMessage").removeClass('alert-danger').addClass('alert-success');
                    } else {
                        $("#proMessage").removeClass('alert-success').addClass('alert-danger');
                    }

                    $('#proMessage').html(response.message);
                    $('#proMessage').show();
                    $('html, body').animate({
                        scrollTop: $("#addForm").offset().top
                    }, 2000);
                }
            });

        }
    })
}