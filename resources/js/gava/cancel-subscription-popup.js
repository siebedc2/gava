$('.cancel-subscription').click(function(e){
    e.preventDefault();
    var form= $(this.parentElement);

    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            form.submit();
        });
});