jQuery('.close-login-popup').click(function() {
    
    jQuery('.login-popup-container').fadeOut(300, function() {
        jQuery('.login-popup-container').removeClass('d-flex');
    });
});