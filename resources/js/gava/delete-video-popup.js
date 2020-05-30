jQuery('.mobile-video-options').click(function(e){
    var courseId = jQuery(e.target).parent().prev().prev().val();
    var videoId = jQuery(e.target).parent().prev().val();
    var video = jQuery(e.target).parent().parent().parent();

    jQuery('.video-options-menu').css('bottom', '75px');
    jQuery('.add-video-col').css('bottom', '230px');

    if(courseId != "") {
        jQuery('.edit-video').attr("href", "/course/" + courseId + "/video/edit/" + videoId);
    }

    else {
        jQuery('.edit-video').attr("href", "/course/video/edit/" + videoId);
    }
    
    jQuery('.delete-video').prev().val(videoId);
    
    jQuery('.delete-video').click(function(e){
        delete_course(video, courseId, videoId);
        hide_options(e);
    })

    jQuery('.cancel-btn').click(function(e){
        hide_options(e);
    });

})

jQuery('.delete-video').click(function(e){
    var videoId = jQuery(this).prev().attr('value');
    var video = jQuery(this).parent().parent();        
    var courseId = jQuery(this).prev().prev().attr('value');

    delete_course(video, courseId, videoId);
})

function delete_course(video, courseId, videoId) {
    jQuery.ajax({
        method: "POST",
        url: '/course/getVideo',
        data: {
            videoId : videoId,
            courseId : courseId
        },
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){    
        
        console.log(response.video);

        if (response.message == "success") {

            jQuery('.popup-video-title').html(response.video.title);
            jQuery('.popup-video-picture').css('background-image', 'url(/images/uploads/' + response.video.tumbnail + ')');
            
            jQuery('#confirm').modal({ backdrop: 'static', keyboard: false }).on('click', '#delete-btn', function(e){
                
                e.preventDefault();
                
                console.log(courseId);
            
                jQuery.ajax({
                    method: "POST",
                    url: '/course/video/delete',
                    data: {
                        videoId : videoId,
                        courseId : courseId
                    },
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                })
                
                .done(function(response){    
                    
                    if (response.message == "success") {
                        jQuery('#confirm').modal('hide');

                        jQuery(video).fadeOut(500, function(){
                            jQuery(this).removeClass('d-flex');
                            jQuery(this).addClass('d-none');
                        });
                        
                    }
                });
            });
        }
    });

}

function hide_options(e) {
    jQuery('.video-options-menu').css('bottom', '-80px');
    jQuery('.add-video-col').css('bottom', '110px');
}

