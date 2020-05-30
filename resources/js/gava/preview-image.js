var profile_picture_input = jQuery('#profile_picture').val();

if (typeof profile_picture_input !== "undefined" && profile_picture_input != null) {
    jQuery('#profile_picture').on('change', function(e){
        var reader = new FileReader();
        reader.onload = function () {
            jQuery('.edit-profile-image').css('background-image', 'url(' + reader.result + ')');
        };
        reader.readAsDataURL(e.target.files[0]);
    });
}

var tumbnail_input = jQuery('#tumbnail').val();

if (typeof tumbnail_input !== "undefined" && tumbnail_input != null) {
    jQuery('#tumbnail').on('change', function(e){
        var x = window.matchMedia("(max-width: 768px)");
        if(x.matches) {
            filename  = this.value;
            var lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }

            console.log(filename);

            jQuery('p.edit-tumbnail').html(filename);
        }

        else {
            var reader = new FileReader();
            reader.onload = function () {    
                jQuery('div.edit-tumbnail, label.edit-tumbnail').css('background-image', 'url(' + reader.result + ')');
                jQuery('label.edit-tumbnail').addClass('tumbnail');
                jQuery('.fa-pencil').removeClass('d-none');
                jQuery('.add-icon').addClass('d-none');
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });
}

var video_input = jQuery('#video').val();
if (typeof video_input !== "undefined" && video_input != null) {
    jQuery('#video').on('change', function(e){
        var x = window.matchMedia("(max-width: 768px)");
        if(x.matches) {
            filename  = this.value;
            var lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }
    
            console.log(filename);
            jQuery('p.edit-video').html(filename);
        }

        else {
            jQuery('label.edit-video').removeClass('d-md-flex');
            jQuery('.video-preview').removeClass('d-md-none');
            jQuery('.video-preview').addClass('d-md-block');
            var jQuerysource = jQuery('#video-source');
            jQuerysource[0].src = URL.createObjectURL(this.files[0]);
            jQuerysource.parent()[0].load();
        }
    });
}