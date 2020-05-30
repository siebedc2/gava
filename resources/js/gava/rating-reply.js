jQuery('.reply-rating').click(function(e) {
    var reply_btn = jQuery(e.target);
    var form = jQuery(e.target).next();

    reply_btn.addClass('d-none');
    form.removeClass('d-none');
});

jQuery('.add-reply').click(function(e){
    e.preventDefault();
    
    var reply = jQuery(e.target).parent().prev().prev().children('input').val();
    var ratingId = jQuery(e.target).parent().prev().closest('.ratingId').val();
    var form = jQuery(e.target).closest('form');
    var reply_container = jQuery(e.target).closest('form').next();
    var reply_container_text = jQuery(reply_container).find('.reply_text');

    jQuery.ajax({
        method: "POST",
        url: '/course/ratings/reply',
        data: {
            reply : reply,
            ratingId : ratingId
        },
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){ 
        if(response.message == "success") {
            jQuery(form).fadeOut(300, function(){
                jQuery(reply_container).removeClass('d-none');
                jQuery(reply_container_text).html(reply);
            });
        }
    });
});