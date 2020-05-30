var multiSelect = jQuery('#tags').val();

if (typeof multiSelect !== "undefined" && multiSelect != null) {
    jQuery(function () {
        jQuery('#tags').multipleSelect()
    })
}