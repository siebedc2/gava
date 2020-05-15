$('.delete-video').click(function(e){
    e.preventDefault();
    var video = $(this).parent().parent();
    var videoId = $(this).prev().attr('value');
    var courseId = $(this).prev().prev().attr('value');

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
            $(video).fadeOut(500, function(){
                $(this).removeClass('d-flex');
                $(this).addClass('d-none');
            });
            
        }
    });
});