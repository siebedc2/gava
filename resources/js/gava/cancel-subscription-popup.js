jQuery('.cancel-subscription').click(function(e){
    e.preventDefault();
    var form = jQuery(this.parentElement);
    var creatorId = jQuery(this).prev().attr('value');
    console.log(creatorId);

    jQuery.ajax({
        method: "POST",
        url: '/subscriptions/getCreator',
        data: {
            creatorId : creatorId
        },
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){    
        
        console.log(response.creator);

        if (response.message == "success") {

            jQuery('.popup-subscriber-name').html(response.creator.name);
            jQuery('.popup-subscriber-picture').css('background-image', 'url(/images/uploads/' + response.creator.profile_picture + ')');

            jQuery('#confirm').modal({ backdrop: 'static', keyboard: false })
                .on('click', '#delete-btn', function(){
                form.submit();
            });
        }
    });
});