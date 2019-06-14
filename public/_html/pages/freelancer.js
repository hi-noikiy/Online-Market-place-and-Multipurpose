// //Get pagination data
// $(document).on('click', '.pagination a', function(event) {
//     event.preventDefault();
//     var page = $(this).attr('href').split('page=')[1];
//     paginageData(page);
// });

// function paginageData(page) {
//     $.ajax({
//         type: 'POST',
//         url: baseUrl + "Customer/Read?page=" + page,
//         success: function(data) {
//             $('#projectList').html(data);
//         }
//     });
// }

// $("#dob").datepicker({
//     autoclose: true,
//     format: 'dd/mm/yyyy'
// });

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


$('#freelancerMessage').hide();

function createProfile() {
    $('#addForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Freelancer/AddProfile",
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