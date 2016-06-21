$(document).ready(function() {
    $('#mediaForm').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var method = 'POST';
        if (parseInt($('input[name="media_id"]').val()) > 0) {
            method = 'PUT';
        }
        form.find('.alert').remove();
        $.ajax({
            url: url,
            type: method,
            dataType: 'json',
            data: form.serialize(),
        })
        .done(function(rs) {
            var message = '<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button><strong>Success!</strong> ' + rs.message + '</div>';
            var _form = $('<form action="' + window.location.href + '" method="post">' +
                '<input type="hidden" name="message" value="' + message.toHtmlEntities() + '" />' +
                '</form>');
            $('body').append(_form);
            _form.submit();
        })
        .fail(function(rs) {
            rs = $.parseJSON(rs.responseText);
            if (!rs.message) {
                rs.message = 'An error occurred';
            }
            form.prepend('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button><strong>Oh snap!</strong> ' + rs.message + '</div>');
            if (rs.errors) {
                form_errors_append(form, rs.errors);
            }
        })
        .always(function(rs) {
            //
        });
    });
});

function responsive_filemanager_callback(field_id) {
    var url = $('#' + field_id).val();
    if (field_id == 'media_url') {
        $('#urlPreview').attr('src', url);
    } else {
        $('#thumbnailPreview').attr('src', url);
    }
    url = url.replace(window.location.origin, '');
    $('#' + field_id).val(url);
    $('.btn-group-file .fileupload-exists').show();
    $('.btn-group-file .fileupload-new').hide();
}

function removeThumbnail() {
    $('#thumbnailPreview').attr('src', $('#thumbnailPreview').data('origin'));
    $('.thumbnail-group .btn-group-file .fileupload-exists').hide();
    $('.thumbnail-group .btn-group-file .fileupload-new').show();
    $('#thumbnail').val('');
}

function removeMediaUrl() {
    $('#urlPreview').attr('src', $('#urlPreview').data('origin'));
    $('.media-url-group .btn-group-file .fileupload-exists').hide();
    $('.media-url-group .btn-group-file .fileupload-new').show();
    $('#media_url').val('');
}

function add_config() {
    var template = $('#configTemplate').html();
    $('#configForm').append(template);
}

function remove_config(el) {
    $(el).parents('.form-group').remove();
}

function go_to_widget_details_page(widget_id) {
    window.location.href = '/admin/widget/config/' + widget_id;
}