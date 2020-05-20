var content_rating = $('.content-rating').val();
var quality_rating = $('.quality-rating').val();
var rating_filter  = $('.rating-filter').val();

if (typeof content_rating !== "undefined" && content_rating != null || typeof quality_rating !== "undefined" && quality_rating != null) {
    $('input[type=radio][name=content]').click(function (e) {
        reset_content_stars();
        
        var stars_value = $(e.target).val(); 
        var stars = $('.content-rating .star'); 
        
        console.log(stars[0]);

        for(i=0; i <= stars_value - 1 ; i++) {
            $(stars[i]).addClass('star-checked');
        }

    });

    $('input[type=radio][name=quality]').click(function (e) {
        reset_quality_stars();

        var stars_value = $(e.target).val(); 
        var stars = $('.quality-rating .star'); 
        
        console.log(stars[0]);

        for(i=0; i <= stars_value - 1 ; i++) {
            $(stars[i]).addClass('star-checked');
        }

    });

    function reset_content_stars() {
        $('.content-rating .star').removeClass('star-checked');
    }

    function reset_quality_stars() {
        $('.quality-rating .star').removeClass('star-checked');
    }

}

if (typeof rating_filter !== "undefined" && rating_filter != null) {
    $('input[type=radio][name=rating]').click(function (e) {
        reset_rating_stars();
        
        var stars_value = $(e.target).val(); 
        var stars = $('.rating-filter .star'); 
        
        console.log(stars[0]);

        for(i=0; i <= stars_value - 1 ; i++) {
            $(stars[i]).addClass('star-checked');
        }

    });

    function reset_rating_stars() {
        $('.rating-filter .star').removeClass('star-checked');
    }
}