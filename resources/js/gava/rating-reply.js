$('.reply-rating').click(function(e) {
    var reply_btn = $(e.target);
    var form = $(e.target).next();

    reply_btn.addClass('d-none');
    form.removeClass('d-none');
});

$('.add-reply').click(function(e){
    e.preventDefault();
    
    var reply = $(e.target).parent().prev().prev().children('input').val();
    var ratingId = $(e.target).parent().prev().closest('.ratingId').val();
    var form = $(e.target).closest('form');
    var reply_container = $(e.target).closest('form').next();
    var reply_container_text = $(reply_container).find('.reply_text');

    $.ajax({
        method: "POST",
        url: '/course/ratings/reply',
        data: {
            reply : reply,
            ratingId : ratingId
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){ 
        if(response.message == "success") {
            $(form).fadeOut(300, function(){
                $(reply_container).removeClass('d-none');
                $(reply_container_text).html(reply);
            });
        }
    });
});