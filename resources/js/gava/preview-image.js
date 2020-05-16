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
        var reader = new FileReader();
        reader.onload = function () {
            var x = window.matchMedia("(max-width: 768px)");

            console.log(reader.result);

            if(x.matches) {
                $('p.edit-tumbnail').html(reader.result)
            }

            else {
                $('div.edit-tumbnail').css('background-image', 'url(' + reader.result + ')');
            }
            
        };
        reader.readAsDataURL(e.target.files[0]);
    });
}