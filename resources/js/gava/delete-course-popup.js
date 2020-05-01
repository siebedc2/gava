$('.delete-btn').click(function(e){
    e.preventDefault();
    var form = $(this.parentElement);
    var courseId = $(this).prev().attr('value');
    console.log(courseId);

    $.ajax({
        method: "POST",
        url: '/dashboard/getCourse',
        data: {
            courseId : courseId
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    
    .done(function(response){    
        
        console.log(response.course);

        if (response.message == "success") {

            $('.popup-course-title').html(response.course.title);
            $('.popup-course-picture').css('background-image', 'url(/images/uploads/' + response.course.tumbnail + ')');

            $('#confirm').modal({ backdrop: 'static', keyboard: false })
                .on('click', '#delete-btn', function(){
                    form.submit();
                });
        }
    });

    
});