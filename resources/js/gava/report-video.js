jQuery('.report-video').click(function(){
    var videoId = jQuery(this).find('.videoId').attr('value');
    console.log(videoId);

    jQuery.ajax({
        method: "POST",
        url: '/course/video/report',
        data: {
            videoId : videoId
        },
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){    
        
        console.log(response);

        if (response.message == "success") {

        }
    });
});