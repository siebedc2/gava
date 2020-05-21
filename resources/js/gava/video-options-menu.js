/*$('.mobile-video-options').click(function(e){
    var courseId = $(e.target).parent().prev().prev().val();
    var videoId = $(e.target).parent().prev().val();
    console.log(courseId);

    $('.video-options-menu').css('bottom', '75px');
    $('.add-video-col').css('bottom', '230px');

    if(courseId != "") {
        $('.edit-video').attr("href", "/course/" + courseId + "/video/edit/" + videoId);
    }

    else {
        $('.edit-video').attr("href", "/course/video/edit/" + videoId);
    }
    
    $('.delete-video').prev().val(videoId);
})

$('.cancel-btn').click(function(e){
    $('.video-options-menu').css('bottom', '-80px');
    $('.add-video-col').css('bottom', '110px');
});*/