$('.mobile-video-options').click(function(e){
    var courseId = $(e.target).parent().prev().prev().val();
    var videoId = $(e.target).parent().prev().val();
    video = $(e.target).parent().parent().parent();

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
});

$('.delete-video').click(function(e){

    e.preventDefault();
    var videoId = $(this).prev().attr('value');

    var x = window.matchMedia("(min-width: 768px)");
    if(x.matches) {
        var video = $(this).parent().parent();    
    }

    //console.log(video);
    
    var courseId = $(this).prev().prev().attr('value');

    //console.log(videoId);

    /*$.ajax({
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
            
            $('#confirm').modal({ backdrop: 'static', keyboard: false }).on('click', '#delete-btn', function(){
                
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
    });*/
});