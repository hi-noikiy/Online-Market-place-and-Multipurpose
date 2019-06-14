
function searchJob() {
    $('#searchJob').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "Search/Read",
                data: $('#searchJob').serialize(),
                dataType: 'json',
                success: function(response) {
                    console.log("enter in success");
                }
            });

        }
    })
}

function paginageData(page) {
    $.ajax({
        type: 'POST',
        url: baseUrl + "Search/Read?page=" + page,
        success: function(data) {
            $('#projectList').html(data);
        }
    });
}