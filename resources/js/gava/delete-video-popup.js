$('.mobile-video-options').click(function(e){
    var courseId = $(e.target).parent().prev().prev().val();
    var videoId = $(e.target).parent().prev().val();
    var video = $(e.target).parent().parent().parent();

    $('.video-options-menu').css('bottom', '75px');
    $('.add-video-col').css('bottom', '230px');

    if(courseId != "") {
        $('.edit-video').attr("href", "/course/" + courseId + "/video/edit/" + videoId);
    }

    else {
        $('.edit-video').attr("href", "/course/video/edit/" + videoId);
    }
    
    $('.delete-video').prev().val(videoId);
    
    $('.delete-video').click(function(e){
        delete_course(video, courseId, videoId);
        hide_options(e);
    })

    $('.cancel-btn').click(function(e){
        hide_options(e);
    });

})

$('.delete-video').click(function(e){
    var videoId = $(this).prev().attr('value');
    var video = $(this).parent().parent();        
    var courseId = $(this).prev().prev().attr('value');

    delete_course(video, courseId, videoId);
})

function delete_course(video, courseId, videoId) {
    $.ajax({
        method: "POST",
        url: '/course/getVideo',
        data: {
            videoId : videoId,
            courseId : courseId
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){    
        
        console.log(response.video);

        if (response.message == "success") {

            $('.popup-video-title').html(response.video.title);
            $('.popup-video-picture').css('background-image', 'url(/images/uploads/' + response.video.tumbnail + ')');
            
            $('#confirm').modal({ backdrop: 'static', keyboard: false }).on('click', '#delete-btn', function(e){
                
                e.preventDefault();
                
                console.log(courseId);
            
                $.ajax({
                    method: "POST",
                    url: '/course/video/delete',
                    data: {
                        videoId : videoId,
                        courseId : courseId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                
                .done(function(response){    
                    
                    if (response.message == "success") {
                        $('#confirm').modal('hide');

                        $(video).fadeOut(500, function(){
                            $(this).removeClass('d-flex');
                            $(this).addClass('d-none');
                        });
                        
                    }
                });
            });
        }
    });

}

function hide_options(e) {
    $('.video-options-menu').css('bottom', '-80px');
    $('.add-video-col').css('bottom', '110px');
}

