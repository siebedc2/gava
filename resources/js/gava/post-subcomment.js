$('.add-textsubcomment').click(function(e) {
    var form = $(e.target).parent().parent().parent().next().find('.subcomment-form');
    form.removeClass('d-none');

    $('.add-subcomment').click(function(e) {
        e.preventDefault();

        var comment     = $(form).find('#subcomment').val();
        var commentId   = $(form).find('.commentId').val();
        var videoId     = $(form).find('.videoId').val();
        var type        = "text";
        var subcomment  = "1";

        $.ajax({
            method: "POST",
            url: '/comment/post',
            data: {
                comment     : comment,
                videoId     : videoId,
                commentId   : commentId,
                type        : type,
                subcomment  : subcomment
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    
        .done(function(response){    
        
            console.log(response);

            if (response.message == "success") {
                $(".comments").remove();
                $(".comments-wrapper").append(response.commentsHTML);
            }
        });
    });
    
});