jQuery(document).ready(function ($) {

    let mediaUploader;

    $('#blog_banner_upload').on('click', function (e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media({
            title: 'Select Blog Banner Image',
            button: { text: 'Use this image' },
            multiple: false
        });

        mediaUploader.on('select', function () {
            const attachment = mediaUploader
                .state()
                .get('selection')
                .first()
                .toJSON();

            $('#blog_banner_image').val(attachment.url);
            $('#blog_banner_preview')
                .attr('src', attachment.url)
                .show();
        });

        mediaUploader.open();
    });

    $('#blog_banner_remove').on('click', function () {
        $('#blog_banner_image').val('');
        $('#blog_banner_preview').hide();
    });

});
