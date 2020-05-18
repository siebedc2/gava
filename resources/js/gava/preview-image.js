var profile_picture_input = $('#profile_picture').val();

if (typeof profile_picture_input !== "undefined" && profile_picture_input != null) {
    $('#profile_picture').on('change', function(e){
        var reader = new FileReader();
        reader.onload = function () {
            $('.edit-profile-image').css('background-image', 'url(' + reader.result + ')');
        };
        reader.readAsDataURL(e.target.files[0]);
    });
}

var tumbnail_input = $('#tumbnail').val();

if (typeof tumbnail_input !== "undefined" && tumbnail_input != null) {
    $('#tumbnail').on('change', function(e){
        var x = window.matchMedia("(max-width: 768px)");
        if(x.matches) {
            filename  = this.value;
            var lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }

            console.log(filename);

            $('p.edit-tumbnail').html(filename);
        }

        else {
            var reader = new FileReader();
            reader.onload = function () {    
                $('div.edit-tumbnail, label.edit-tumbnail').css('background-image', 'url(' + reader.result + ')');
                $('label.edit-tumbnail').addClass('tumbnail');
                $('.fa-pencil').removeClass('d-none');
                $('.add-icon').addClass('d-none');
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });
}

var video_input = $('#video').val();
if (typeof video_input !== "undefined" && video_input != null) {
    $('#video').on('change', function(e){
        var x = window.matchMedia("(max-width: 768px)");
        if(x.matches) {
            filename  = this.value;
            var lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }
    
            console.log(filename);
            $('p.edit-video').html(filename);
        }

        else {
            $('label.edit-video').removeClass('d-md-flex');
            $('.video-preview').removeClass('d-md-none');
            $('.video-preview').addClass('d-md-block');
            var $source = $('#video-source');
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
        }
    });
}