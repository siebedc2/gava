jQuery('#my-statistics').click(function() {
    jQuery('#my-courses').removeClass('active');
    jQuery('#my-courses').addClass('non-active');

    jQuery('#my-statistics').removeClass('non-active');
    jQuery('#my-statistics').addClass('active');

    jQuery('#myStatisticsContainer').removeClass('d-none');
    jQuery('#myStatisticsContainer').addClass('d-block');

    jQuery('#myCoursesContainer').addClass('d-none');
    jQuery('#myCoursesContainer').removeClass('d-block');

    jQuery('#add-course').addClass('d-none');
});

jQuery('.revenue-icon').click(function() {
    jQuery('#confirm-note').modal({ backdrop: 'static', keyboard: false });
});

jQuery('#my-courses').click(function() {
    jQuery('#my-statistics').removeClass('active');
    jQuery('#my-statistics').addClass('non-active');

    jQuery('#my-courses').removeClass('non-active');
    jQuery('#my-courses').addClass('active');

    jQuery('#myCoursesContainer').removeClass('d-none');
    jQuery('#myCoursesContainer').addClass('d-block');

    jQuery('#myStatisticsContainer').addClass('d-none');
    jQuery('#myStatisticsContainer').removeClass('d-block');

    jQuery('#add-course').removeClass('d-none');
});