$('.upvote-comment').click(function(){
    var commentId = $(this).parent().parent().parent().find('.commentId').html();
    var upvoteAmount = $(this).next();
    console.log(commentId);

    $.ajax({
        method: "POST",
        url: '/comment/upvote',
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
            upvoteAmount.html(parseInt($(upvoteAmount).html()) + 1);
        }

        else if(response.message == "hasAlready") {
            upvoteAmount.html(parseInt($(upvoteAmount).html()) - 1);
        }
    });
});