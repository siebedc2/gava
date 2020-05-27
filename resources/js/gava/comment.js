window.initCommentEvents = function() {
    // Like comment
    $('.like-comment').click(function(){
        var videoId = $(this).parent().parent().parent().find('.videoId').html();
        var commentId = $(this).parent().parent().parent().find('.commentId').html();
        var likeAmount = $(this).next();
        console.log(commentId);
    
        $.ajax({
            method: "POST",
            url: '/comment/like',
            data: {
                commentId : commentId,
                videoId   : videoId
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        
        .done(function(response){    
            
            console.log(response);
    
            if (response.message == "success") {
                likeAmount.html(parseInt($(likeAmount).html()) + 1);
                $(".comments").remove();
                $(".comments-wrapper").append(response.commentsHTML);
                window.initCommentEvents();
            }
    
            else if(response.message == "hasAlready") {
                likeAmount.html(parseInt($(likeAmount).html()) -1);
                $(".comments").remove();
                $(".comments-wrapper").append(response.commentsHTML);
                window.initCommentEvents();
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

    // Post comment (text)
    $('.add-comment').click(function(e){
        e.preventDefault();

        console.log('bericht');
    
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
                    $('#comment').addClass('border-0');
                    $('#comment').removeClass('border-danger');

                    $(".comments").remove();
                    $(".comments-wrapper").append(response.commentsHTML);
                    
                    $(e.target).parent().prev().find('#comment').val('');
                    window.initCommentEvents();
                }
            });
        }
    
        else {
            console.log('leeg');
            $('#comment').removeClass('border-0');
            $('#comment').addClass('border-danger');
        }
    });

    // Post comment (video)
    $('#video-comment').change(function(e){

        var videoId = $(e.target).prev().prev().val();
        var type = "video";
        var subcomment = "0";

        var formData = new FormData($('.video-comment-form')[0]);
        formData.append('videoId', videoId);
        formData.append('type', type);
        formData.append('subcomment', subcomment);

        $('#video-confirm').modal({ backdrop: 'static', keyboard: false }).on('click', '#confirm-btn', function(e){
            e.preventDefault();
            
            console.log(formData);

            $.ajax({
                method: "POST",
                url: '/videocomment/post',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        
            .done(function(response){    
                
                console.log(response.message);

                if (response.message == "success") {
                    $('#comment').addClass('border-0');
                    $('#comment').removeClass('border-danger');
                    $(".comments").remove();
                    $(".comments-wrapper").append(response.commentsHTML);
                    $('#video-confirm').modal('hide');
                    $('#video-comment').parent().val('');
                    //window.initCommentEvents();
                }
            });
        });
    });

    // Post subcomment (text)
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

            if(typeof comment !== "undefined" && comment != null && comment !== "") {
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
            }   

            else {
                $(form).find('#subcomment').removeClass('border-0');
                $(form).find('#subcomment').addClass('border-danger');
            }

        });
    
    });

    // Post subcomment (video)
    $('.add-video-subcomment').click(function(e){
        
        var form = $(e.target).parent().parent().parent().find('.video-subcomment-form');
        
        $('#video-subcomment').change(function(e){
            var commentId = $(form).find('.commentId').val();
            var videoId = $(form).find('.videoId').val();
        
            e.preventDefault();

            var type = "video";
            var subcomment = "1";

            var formData = new FormData($('.video-subcomment-form')[0]);
            formData.append('videoId', videoId);
            formData.append('commentId', commentId);
            formData.append('type', type);
            formData.append('subcomment', subcomment);

            $('#video-confirm').modal({ backdrop: 'static', keyboard: false }).on('click', '#confirm-btn', function(e){
                e.preventDefault();

                $.ajax({
                    method: "POST",
                    url: '/videocomment/post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
        
                .done(function(response){    
                    
                    console.log(response.message);

                    if (response.message == "success") {
                        form.addClass('d-none');
                        $('#video-subcomment').val('');
                        $('#video-confirm').modal('hide');
                        $(".comments").remove();
                        $(".comments-wrapper").append(response.commentsHTML);
                        window.initCommentEvents();
                    }
                });
            });
        });       
    });
}

initCommentEvents();