$('.filter-menu').click(function() {
    $('.filter-container').removeClass('d-none');
});

$('.close-filter').click(function() {
    $('.filter-container').addClass('d-none');
})


$('.filter-form').change(function(e){
    var search  = $('#search').val();
    var tags    = $('#tags option:selected').val();
    var sort    = $('#sort option:selected').val();
    var rating  = $('input[name=rating]:checked').val();
    
    $.ajax({
        type: 'GET',
        url: '/home',
        data: {
            search : search,
            tags   : tags,
            sort   : sort,
            rating : rating
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function(response){    
            
        console.log(response);

        if (response.message == "success") {
            $(".courses").remove();
            $(".courses-wrapper").append(response.coursesHTML);
        }
    });

})