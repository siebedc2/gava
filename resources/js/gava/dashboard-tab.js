$('#my-statistics').click(function() {
    $('#my-courses').removeClass('active');
    $('#my-courses').addClass('non-active');

    $('#my-statistics').removeClass('non-active');
    $('#my-statistics').addClass('active');

    $('#myStatisticsContainer').removeClass('d-none');
    $('#myStatisticsContainer').addClass('d-block');

    $('#myCoursesContainer').addClass('d-none');
    $('#myCoursesContainer').removeClass('d-block');
});

$('#my-courses').click(function() {
    $('#my-statistics').removeClass('active');
    $('#my-statistics').addClass('non-active');

    $('#my-courses').removeClass('non-active');
    $('#my-courses').addClass('active');

    $('#myCoursesContainer').removeClass('d-none');
    $('#myCoursesContainer').addClass('d-block');

    $('#myStatisticsContainer').addClass('d-none');
    $('#myStatisticsContainer').removeClass('d-block');
});