$('.report-user').click(function(){
    var userId = $(this).find('.userId').attr('value');
    console.log(userId);

    $.ajax({
        method: "POST",
        url: '/profile/user/report',
        data: {
            userId : userId
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