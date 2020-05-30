jQuery('.delete-btn').click(function(e){
    e.preventDefault();
    var form = jQuery(this.parentElement);
    var courseId = jQuery(this).prev().attr('value');
    console.log(courseId);

    jQuery.ajax({
        method: "POST",
        url: '/dashboard/getCourse',
        data: {
            courseId : courseId
        },
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){    
        
        console.log(response.course);

        if (response.message == "success") {

            jQuery('.popup-course-title').html(response.course.title);
            jQuery('.popup-course-picture').css('background-image', 'url(/images/uploads/' + response.course.tumbnail + ')');

            jQuery('#confirm').modal({ backdrop: 'static', keyboard: false })
                .on('click', '#delete-btn', function(){
                    form.submit();
            });
        }
    });

    
});