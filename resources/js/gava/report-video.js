$('.report-video').click(function(){
    var videoId = $(this).find('.videoId').attr('value');
    console.log(videoId);

    $.ajax({
        method: "POST",
        url: '/course/video/report',
        data: {
            videoId : videoId
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){    
        
        console.log(response);

        if (response.message == "success") {

        }
    });
});