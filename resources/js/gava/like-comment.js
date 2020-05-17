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
    });
});