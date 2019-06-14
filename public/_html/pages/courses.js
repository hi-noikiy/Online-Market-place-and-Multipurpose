//Courses read
$('#coursesList').on('click', '.pagination a', function(event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    paginageData(page);
});

function paginageData(page) {
    $.ajax({
        type: 'POST',
        url: baseUrl + "CoursesReadAjax?page=" + page,
        success: function(data) {
            $('#coursesList').html(data);
        }
    });
}