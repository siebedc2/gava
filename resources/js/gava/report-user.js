jQuery('.report-user').click(function(){
    var userId = jQuery(this).find('.userId').attr('value');
    console.log(userId);

    jQuery.ajax({
        method: "POST",
        url: '/profile/user/report',
        data: {
            userId : userId
        },
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){    
        
        console.log(response);

        if (response.message == "success") {

        }
    });
});