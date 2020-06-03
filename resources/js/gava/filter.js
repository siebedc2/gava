jQuery('.filter-menu').click(function() {
    jQuery('.filter-container').removeClass('d-none');
});

jQuery('.close-filter').click(function() {
    jQuery('.filter-container').addClass('d-none');
})

jQuery('#search').keypress(function(e) {
    if (e.keyCode === 10 || e.keyCode === 13) {
        e.preventDefault();
        filter();
    }
});

jQuery('.filter-form').change(function(e){
    filter();
})

function filter() {
    var search  = jQuery('#search').val();
    var tags    = jQuery('#tags option:selected').val();
    var sort    = jQuery('#sort option:selected').val();
    var rating  = jQuery('input[name=rating]:checked').val();
    
    jQuery.ajax({
        type: 'GET',
        url: '/home',
        data: {
            search : search,
            tags   : tags,
            sort   : sort,
            rating : rating
        },
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    }).done(function(response){    
            
        console.log(response);

        if (response.message == "success") {
            jQuery(".courses").remove();
            jQuery(".courses-wrapper").append(response.coursesHTML);
        }
    });
}