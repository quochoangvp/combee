$(document).ready(function() {

	if ($('[name="is_static_content"]').prop('checked') == true) {
		$('[data-id="content"]').show();
	} else {
		$('[data-id="content"]').hide();
	}

	$('[name="is_static_content"]').on('change', function() {
		if ($(this).prop('checked') == true) {
			$('[data-id="content"]').show();
		} else {
			$('[data-id="content"]').hide();
		}
	});

	$('#createwidget').submit(function(event) {
		event.preventDefault();
		$('.alert').remove();
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

function delete_widget(id) {
    var cf = confirm('Do you want delete this widget?');
    if (cf) {
        $.ajax({
            url: '/api/widget/delete',
            type: 'DELETE',
            dataType: 'json',
            data: {id: id},
        })
        .done(function(rs) {
            if (rs.status == 200) {
                location.reload();
            } else {
                alert(rs.message);
            }
        })
        .fail(function(rs) {
        	if (!rs.message) {
        		rs.message = 'An error occurred';
        	}
            alert(rs.message);
        })
        .always(function() {
            // console.log("complete");
        });
    }
}