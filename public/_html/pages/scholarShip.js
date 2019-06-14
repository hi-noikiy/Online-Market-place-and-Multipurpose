//Scholarship read
$('#scholarShipList').on('click', '.pagination a', function(event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    paginageData(page);
});

function paginageData(page) {
    $.ajax({
        type: 'POST',
        url: baseUrl + "ScholarShipReadAjax?page=" + page,
        success: function(data) {
            $('#scholarShipList').html(data);
        }
    });
}

//Apply scholarship
$('#applyMessage').hide();

function applyScholarShipModal() {
    $('#scholarShipForm')[0].reset();
    $('#applyModal').modal();
}

function applyScholarShip(info) {
    $('#scholarShipForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            //Value assign
            info.cover_letter = $('#coverLetter').val();

            $.ajax({
                type: "POST",
                url: baseUrl + "ScholarShip/Apply",
                data: info,
                dataType: 'json',
                success: function(response) {
                    if (response.status == "success") {
                        $("#applyMessage").removeClass('alert-danger').addClass('alert-success');
                    } else {
                        $("#applyMessage").removeClass('alert-success').addClass('alert-danger');
                    }

                    $('#applyMessage').html(response.message);
                    $('#applyMessage').show();
                    $('#applyModal').modal('hide');
                    $('html, body').animate({
                        scrollTop: $("#scroll").offset().top
                    }, 2000);
                }
            });

        }
    })

}