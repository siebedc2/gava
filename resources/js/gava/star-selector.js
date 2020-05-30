var content_rating = jQuery('.content-rating').val();
var quality_rating = jQuery('.quality-rating').val();
var rating_filter  = jQuery('.rating-filter').val();

if (typeof content_rating !== "undefined" && content_rating != null || typeof quality_rating !== "undefined" && quality_rating != null) {
    jQuery('input[type=radio][name=content]').click(function (e) {
        reset_content_stars();
        
        var stars_value = jQuery(e.target).val(); 
        var stars = jQuery('.content-rating .star'); 
        
        console.log(stars[0]);

        for(i=0; i <= stars_value - 1 ; i++) {
            jQuery(stars[i]).addClass('star-checked');
        }

    });

    jQuery('input[type=radio][name=quality]').click(function (e) {
        reset_quality_stars();

        var stars_value = jQuery(e.target).val(); 
        var stars = jQuery('.quality-rating .star'); 
        
        console.log(stars[0]);

        for(i=0; i <= stars_value - 1 ; i++) {
            jQuery(stars[i]).addClass('star-checked');
        }

    });

    function reset_content_stars() {
        jQuery('.content-rating .star').removeClass('star-checked');
    }

    function reset_quality_stars() {
        jQuery('.quality-rating .star').removeClass('star-checked');
    }

}

if (typeof rating_filter !== "undefined" && rating_filter != null) {
    jQuery('input[type=radio][name=rating]').click(function (e) {
        reset_rating_stars();
        
        var stars_value = jQuery(e.target).val(); 
        var stars = jQuery('.rating-filter .star'); 
        
        //console.log(stars[0]);

        for(i=0; i <= stars_value - 1 ; i++) {
            jQuery(stars[i]).addClass('star-checked');
        }

    });

    function reset_rating_stars() {
        jQuery('.rating-filter .star').removeClass('star-checked');
    }
}