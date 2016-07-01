$(document).ready(function() {
    $(".form_datetime").datetimepicker({ format: 'yyyy-mm-dd hh:ii:ss' });
    $('form').submit(function(event) {
    	event.preventDefault();
    	var form = $(this);
    	var url = form.attr('action');
        form.find('.alert').remove();
    	$.ajax({
    		url: url,
    		type: 'POST',
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
    $('#thumbnailPreview').attr('src', url);
    url = url.replace(window.location.origin, '');
    $('#' + field_id).val(url);
    $('.btn-group-file .fileupload-exists').show();
    $('.btn-group-file .fileupload-new').hide();
}

function removeThumbnail() {
	$('#thumbnailPreview').attr('src', $('#thumbnailPreview').data('origin'));
	$('.btn-group-file .fileupload-exists').hide();
    $('.btn-group-file .fileupload-new').show();
    $('#thumbnail').val('');
}