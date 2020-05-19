$('.delete-video').click(function(e){

    e.preventDefault();
    var videoId = $(this).prev().attr('value');
    var video = $(this).parent().parent();
    var courseId = $(this).prev().prev().attr('value');

    console.log(videoId);

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
    });
});