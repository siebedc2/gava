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