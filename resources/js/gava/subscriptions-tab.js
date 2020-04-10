$('#creators').click(function() {
    $('#courses').removeClass('active');
    $('#courses').addClass('non-active');

    $('#creators').removeClass('non-active');
    $('#creators').addClass('active');

    $('#creatorsContainer').removeClass('d-none');
    $('#creatorsContainer').addClass('d-block');

    $('#coursesContainer').addClass('d-none');
    $('#coursesContainer').removeClass('d-block');
});

$('#courses').click(function() {
    $('#creators').removeClass('active');
    $('#creators').addClass('non-active');

    $('#courses').removeClass('non-active');
    $('#courses').addClass('active');

    $('#coursesContainer').removeClass('d-none');
    $('#coursesContainer').addClass('d-block');

    $('#creatorsContainer').addClass('d-none');
    $('#creatorsContainer').removeClass('d-block');
});