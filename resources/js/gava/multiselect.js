var multiSelect = $('#tags').val();

if (typeof multiSelect !== "undefined" && multiSelect != null) {
    $(function () {
        $('#tags').multipleSelect()
    })
}