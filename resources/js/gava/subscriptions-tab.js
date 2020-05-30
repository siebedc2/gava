jQuery('#creators').click(function() {
    jQuery('#courses').removeClass('active');
    jQuery('#courses').addClass('non-active');

    jQuery('#creators').removeClass('non-active');
    jQuery('#creators').addClass('active');

    jQuery('#creatorsContainer').removeClass('d-none');
    jQuery('#creatorsContainer').addClass('d-block');

    jQuery('#coursesContainer').addClass('d-none');
    jQuery('#coursesContainer').removeClass('d-block');
});

jQuery('#courses').click(function() {
    jQuery('#creators').removeClass('active');
    jQuery('#creators').addClass('non-active');

    jQuery('#courses').removeClass('non-active');
    jQuery('#courses').addClass('active');

    jQuery('#coursesContainer').removeClass('d-none');
    jQuery('#coursesContainer').addClass('d-block');

    jQuery('#creatorsContainer').addClass('d-none');
    jQuery('#creatorsContainer').removeClass('d-block');
});