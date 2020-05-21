$('.mobile-course-options').click(function(e){
    var courseId = $(e.target).parent().prev().text();

    console.log(courseId);

    $('.course-options-menu').css('bottom', '75px');
    $('.add-course-col').css('bottom', '230px');
    $('.edit-course').attr("href", "/course/edit/" + courseId);
    $('.delete-course-form').attr('action', '/course/delete/' + courseId);
    $('.delete-course-form #courseId').val(courseId);
})

$('.cancel-btn').click(function(e){
    $('.course-options-menu').css('bottom', '-80px');
    $('.add-course-col').css('bottom', '110px');
});