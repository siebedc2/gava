$('.cancel-subscription').click(function(e){
    e.preventDefault();
    var form = $(this.parentElement);
    var creatorId = $(this).prev().attr('value');
    console.log(creatorId);

    $.ajax({
        method: "POST",
        url: '/subscriptions/getCreator',
        data: {
            creatorId : creatorId
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){    
        
        console.log(response.creator);

        if (response.message == "success") {

            $('.popup-subscriber-name').html(response.creator.name);
            $('.popup-subscriber-picture').css('background-image', 'url(/images/uploads/' + response.creator.profile_picture + ')');

            $('#confirm').modal({ backdrop: 'static', keyboard: false })
                .on('click', '#delete-btn', function(){
                form.submit();
            });
        }
    });

    
});