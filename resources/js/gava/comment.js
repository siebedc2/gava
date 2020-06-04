window.initCommentEvents = function () {
    // Like comment
    jQuery('.like-comment').click(function () {
        var videoId = jQuery(this).parent().parent().parent().find('.videoId').html();
        var commentId = jQuery(this).parent().parent().parent().find('.commentId').html();
        var likeAmount = jQuery(this).next();
        console.log(commentId);

        jQuery.ajax({
                method: "POST",
                url: '/comment/like',
                data: {
                    commentId: commentId,
                    videoId: videoId
                },
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            })

            .done(function (response) {

                console.log(response);

                if (response.message == "success") {
                    likeAmount.html(parseInt(jQuery(likeAmount).html()) + 1);
                    jQuery(".comments").remove();
                    jQuery(".comments-wrapper").append(response.commentsHTML);
                } else if (response.message == "hasAlready") {
                    likeAmount.html(parseInt(jQuery(likeAmount).html()) - 1);
                    jQuery(".comments").remove();
                    jQuery(".comments-wrapper").append(response.commentsHTML);
                }

                window.initCommentEvents();
            });
    });

    // Upvote comment
    jQuery('.upvote-comment').click(function () {
        var videoId = jQuery(this).parent().parent().parent().find('.videoId').html();
        var commentId = jQuery(this).parent().parent().parent().find('.commentId').html();
        var upvoteAmount = jQuery(this).next();
        console.log(commentId);

        jQuery.ajax({
                method: "POST",
                url: '/comment/upvote',
                data: {
                    commentId: commentId,
                    videoId: videoId

                },
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            })

            .done(function (response) {

                if (response.message == "success") {
                    upvoteAmount.html(parseInt(jQuery(upvoteAmount).html()) + 1);
                    jQuery(".comments").remove();
                    jQuery(".comments-wrapper").append(response.commentsHTML);
                } else if (response.message == "hasAlready") {
                    upvoteAmount.html(parseInt(jQuery(upvoteAmount).html()) - 1);
                    jQuery(".comments").remove();
                    jQuery(".comments-wrapper").append(response.commentsHTML);
                }

                window.initCommentEvents();
            });
    });

    // Report comment
    jQuery('.report-comment').click(function () {
        var commentId = jQuery(this).parent().parent().parent().find('.commentId').html();
        console.log(commentId);

        jQuery.ajax({
                method: "POST",
                url: '/comment/report',
                data: {
                    commentId: commentId
                },
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            })

            .done(function (response) {

                console.log(response);

                if (response.message == "success") {
                    jQuery('.popup-report-message').html('You have succesfully reported this comment!');
                    jQuery('#report-popup').modal({
                        backdrop: 'static',
                        keyboard: false
                    }).on('click', '#delete-btn', function (e) {});

                    jQuery('.report-comment').css('opacity', '0.5');
                    jQuery('.report-comment').css('pointer-events', 'none');
                    window.initCommentEvents();
                }
            });
    });

    // Post subcomment (text)
    jQuery('.add-textsubcomment').click(function (e) {
        jQuery('.subcomment-form').addClass('d-none');
        var form = jQuery(e.target).parent().parent().parent().next().find('.subcomment-form');
        form.removeClass('d-none');

        jQuery('.add-subcomment').click(function (e) {
            e.preventDefault();

            var comment = jQuery(form).find('#subcomment').val();
            var commentId = jQuery(form).find('.commentId').val();
            var videoId = jQuery(form).find('.videoId').val();
            var type = "text";
            var subcomment = "1";

            if (typeof comment !== "undefined" && comment != null && comment !== "") {
                jQuery.ajax({
                        method: "POST",
                        url: '/comment/post',
                        data: {
                            comment: comment,
                            videoId: videoId,
                            commentId: commentId,
                            type: type,
                            subcomment: subcomment
                        },
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        }
                    })

                    .done(function (response) {

                        console.log(response);

                        if (response.message == "success") {
                            jQuery(form).addClass('d-none');
                            jQuery(".comments").remove();
                            jQuery(".comments-wrapper").append(response.commentsHTML);
                            window.initCommentEvents();
                        }
                    });
            } else {
                jQuery(form).find('#subcomment').removeClass('border-0');
                jQuery(form).find('#subcomment').addClass('border-danger');
            }

        });

    });

    // Post subcomment (video)
    jQuery('.add-video-subcomment').click(function (e) {
        jQuery('input#video-subcomment').val('');
        jQuery('.video-subcomment-form').addClass('d-none');
        var form = jQuery(e.target).parent().parent().parent().find('.video-subcomment-form');
        jQuery(form).removeClass('d-none');
        console.log('clicked');

        jQuery('#video-subcomment').change(function (e) {
            if (this.files[0].size <= 250000000 && this.files[0].type == "video/mp4") {
                e.preventDefault();

                var commentId = jQuery(form).find('.commentId').val();
                var videoId = jQuery(form).find('.videoId').val();
                var type = "video";
                var subcomment = "1";

                var formData = new FormData(jQuery('.video-subcomment-form')[0]);
                formData.append('videoId', videoId);
                formData.append('commentId', commentId);
                formData.append('type', type);
                formData.append('subcomment', subcomment);

                jQuery('#video-confirm').modal({
                    backdrop: 'static',
                    keyboard: false
                }).on('click', '#confirm-btn', function (e) {
                    e.preventDefault();

                    jQuery.ajax({
                            method: "POST",
                            url: '/videocomment/post',
                            data: formData,
                            processData: false,
                            contentType: false,
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            }
                        })

                        .done(function (response) {

                            console.log(response.message);

                            if (response.message == "success") {
                                jQuery(form).addClass('d-none');
                                jQuery(e.target).parent().parent().prev().find('p').removeClass('text-danger');
                                jQuery('#video-subcomment').val('');
                                jQuery('#video-confirm').modal('hide');
                                jQuery(".comments").remove();
                                jQuery(".comments-wrapper").append(response.commentsHTML);
                                window.initCommentEvents();
                            }
                        });
                });
            } else {
                console.log(e.target);
                jQuery(e.target).parent().parent().prev().find('p').addClass('text-danger');
            }
        });
    });
}

initCommentEvents();

// Post comment (text)
jQuery('.add-comment').click(function (e) {
    e.preventDefault();

    var videoId = jQuery(e.target).parent().prev().prev().val();
    var comment = jQuery(e.target).parent().prev().find('#comment').val();

    if (typeof comment !== "undefined" && comment != null && comment !== "") {
        console.log(comment);
        var type = "text";
        var subcomment = "0";

        jQuery.ajax({
                method: "POST",
                url: '/comment/post',
                data: {
                    comment: comment,
                    videoId: videoId,
                    type: type,
                    subcomment: subcomment
                },
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            })

            .done(function (response) {

                console.log(response.commentsHTML);

                if (response.message == "success") {
                    jQuery('#comment').addClass('border-0');
                    jQuery('#comment').removeClass('border-danger');

                    jQuery(".comments").remove();
                    jQuery(".comments-wrapper").append(response.commentsHTML);

                    jQuery(e.target).parent().prev().find('#comment').val('');
                    window.initCommentEvents();
                }
            });
    } else {
        jQuery('#comment').removeClass('border-0');
        jQuery('#comment').addClass('border-danger');
    }
});

// Post comment (video)
jQuery('#video-comment').change(function (e) {

    if (this.files[0].size <= 250000000 && this.files[0].type == "video/mp4") {
        var videoId = jQuery(e.target).prev().prev().val();
        var type = "video";
        var subcomment = "0";

        var formData = new FormData(jQuery('.video-comment-form')[0]);
        formData.append('videoId', videoId);
        formData.append('type', type);
        formData.append('subcomment', subcomment);

        jQuery('#video-confirm').modal({
            backdrop: 'static',
            keyboard: false
        }).on('click', '#confirm-btn', function (e) {

            e.preventDefault();

            jQuery.ajax({
                    method: "POST",
                    url: '/videocomment/post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                })

                .done(function (response) {

                    console.log(response.message);

                    if (response.message == "success") {
                        //jQuery('#comment').addClass('border-0');
                        //jQuery('#comment').removeClass('border-danger');
                        jQuery(e.target).prev().removeClass('border');
                        jQuery(e.target).prev().removeClass('border-danger');
                        jQuery(".comments").remove();
                        jQuery(".comments-wrapper").append(response.commentsHTML);
                        jQuery('#video-confirm').modal('hide');
                        jQuery('#video-comment').parent().val('');
                        window.initCommentEvents();
                    }
                });
        });
    } else {
        jQuery(e.target).prev().addClass('border');
        jQuery(e.target).prev().addClass('border-danger');
    }
});