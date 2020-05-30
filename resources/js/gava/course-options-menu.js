jQuery('.mobile-course-options').click(function(e){
    var courseId = jQuery(e.target).parent().prev().text();

    console.log(courseId);

    jQuery('.course-options-menu').css('bottom', '75px');
    jQuery('.add-course-col').css('bottom', '230px');
    jQuery('.edit-course').attr("href", "/course/edit/" + courseId);
    jQuery('.delete-course-form').attr('action', '/course/delete/' + courseId);
    jQuery('.delete-course-form #courseId').val(courseId);
})

jQuery('.cancel-btn').click(function(e){
    jQuery('.course-options-menu').css('bottom', '-80px');
    jQuery('.add-course-col').css('bottom', '110px');
});