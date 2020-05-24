$('.add-comment').click(function(e){
    e.preventDefault();

    var comment = $(e.target).parent().prev().find('#comment').val();

    console.log(comment);

    /*$.ajax({
        method: "POST",
        url: '/comment/post',
        data: {
            comment : comment
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){    
        
        console.log(response);

        if (response.message == "success") {

        }
    });*/

});