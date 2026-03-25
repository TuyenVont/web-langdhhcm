jQuery(function ($) {
    $(document).on('click', '.hcmv-media-upload', function (e) {
        e.preventDefault();
        var button = $(this);
        var wrapper = button.closest('.hcmv-admin-field');
        var input = wrapper.find('.hcmv-image-id');
        var preview = wrapper.find('.hcmv-media-preview');
        var frame = wp.media({
            title: 'Chọn ảnh',
            button: { text: 'Dùng ảnh này' },
            multiple: false
        });

        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            input.val(attachment.id);
            preview.html('<img src="' + attachment.url + '" alt="">');
        });

        frame.open();
    });

    $(document).on('click', '.hcmv-media-remove', function (e) {
        e.preventDefault();
        var wrapper = $(this).closest('.hcmv-admin-field');
        wrapper.find('.hcmv-image-id').val('');
        wrapper.find('.hcmv-media-preview').html('<span>Chưa chọn ảnh</span>');
    });
});
