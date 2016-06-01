$(document).ready(function() {
	$('.open-create-form').click(function() {
		$('#tag_form .modal-title').text('Add new tag');
	});

	$('#tag_form form').submit(function(event) {
		event.preventDefault();
		var form = $(this);
		var id = parseInt(form.find('[name="tag_id"]').val());
		var url;
		if (id > 0) {
			url = form.data('action-update');
		} else {
			url = form.data('action-create');
		}
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: form.serialize(),
		})
		.done(function(rs) {
			location.reload();
		})
		.fail(function(rs) {
			rs = $.parseJSON(rs.responseText);
            form_errors_append(form, rs.errors, rs.message);
		})
		.always(function() {
			console.log("complete");
		});
	});
});

function open_popup_edit(el) {
	$.get($(el).data('url'), function(rs) {
		$('#tag_form .modal-title').text('Edit: ' + rs.data.tag_title);
		bind_form_data('#tag_form form', rs.data);
		$('#tag_form').modal('show');
	}, 'json');
}