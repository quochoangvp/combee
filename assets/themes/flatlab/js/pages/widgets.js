$(document).ready(function() {

	$('[name="layout[]"]').change(function() {
		var selected = $(this).val();
		if (selected.length>0) {
			$('[data-layout]').hide();
			$.each(selected, function(index, layout) {
				$('[data-layout="'+layout+'"]').show();
			});
		}
	});

	$('#createwidget').submit(function(event) {
		event.preventDefault();
		var method = 'POST';
		if (parseInt($('input[name="widget_id"]').val()) > 0) {
			method = 'PUT';
		}
		var form = $(this);
		$.ajax({
			url: $(this).attr('action'),
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
        });

	});
});