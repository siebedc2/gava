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
            jQuery('.popup-report-message').html('You have succesfully reported this video!');
            jQuery('#report-popup').modal({ backdrop: 'static', keyboard: false }).on('click', '#delete-btn', function(e){});
            jQuery('.report-video').css('opacity', '0.5');
            jQuery('.report-video').css('pointer-events', 'none');
        }
    });
});