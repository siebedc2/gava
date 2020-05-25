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
            }
        });
    }

    else {
        alert('lege comment');
    }
});