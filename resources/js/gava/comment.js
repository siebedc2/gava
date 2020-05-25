window.initCommentEvents = function() {
    // Like comment
    $('.like-comment').click(function(){
        var commentId = $(this).parent().parent().parent().find('.commentId').html();
        var likeAmount = $(this).next();
        console.log(commentId);
    
        $.ajax({
            method: "POST",
            url: '/comment/like',
            data: {
                commentId : commentId
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        
        .done(function(response){    
            
            console.log(response);
    
            if (response.message == "success") {
                likeAmount.html(parseInt($(likeAmount).html()) + 1);
            }
    
            else if(response.message == "hasAlready") {
                likeAmount.html(parseInt($(likeAmount).html()) -1);
            }
        });
    });

    // Upvote comment
    $('.upvote-comment').click(function(){
        var videoId = $(this).parent().parent().parent().find('.videoId').html();
        var commentId = $(this).parent().parent().parent().find('.commentId').html();
        var upvoteAmount = $(this).next();
        console.log(commentId);
    
        $.ajax({
            method: "POST",
            url: '/comment/upvote',
            data: {
                commentId   : commentId,
                videoId     : videoId

            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        
        .done(function(response){    
            
            console.log(response);
    
            if (response.message == "success") {
                upvoteAmount.html(parseInt($(upvoteAmount).html()) + 1);
                $(".comments").remove();
                $(".comments-wrapper").append(response.commentsHTML);
                window.initCommentEvents();
            }
    
            else if(response.message == "hasAlready") {
                upvoteAmount.html(parseInt($(upvoteAmount).html()) - 1);
                $(".comments").remove();
                $(".comments-wrapper").append(response.commentsHTML);
                window.initCommentEvents();
            }
        });
    });

    // Report comment
    $('.report-comment').click(function(){
        var commentId = $(this).parent().parent().parent().find('.commentId').html();
        console.log(commentId);
    
        $.ajax({
            method: "POST",
            url: '/comment/report',
            data: {
                commentId : commentId
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

    // Post comment
    $('.add-comment').click(function(e){
        e.preventDefault();
    
        var videoId = $(e.target).parent().prev().prev().val();
        var comment = $(e.target).parent().prev().find('#comment').val();
    
        if(typeof comment !== "undefined" && comment != null && comment !== "") {
            console.log(comment);
            var type = "text";
            var subcomment = "0";
    
            $.ajax({
                method: "POST",
                url: '/comment/post',
                data: {
                    comment     : comment,
                    videoId     : videoId,
                    type        : type,
                    subcomment  : subcomment
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        
            .done(function(response){    
            
                console.log(response.commentsHTML);
    
                if (response.message == "success") {
                    $(".comments").remove();
                    $(".comments-wrapper").append(response.commentsHTML);
                    $(e.target).parent().prev().find('#comment').val('');
                    window.initCommentEvents();
                }
            });
        }
    
        else {
            alert('lege comment');
        }
    });

    // Post subcomment
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
                window.initCommentEvents();
            }
        });
    });
    
});
}

initCommentEvents();