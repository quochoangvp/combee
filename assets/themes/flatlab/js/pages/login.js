$(document).ready(function() {
	$('.form-signin').submit(function(event) {
		event.preventDefault();
		var form = $(this);
		var url = form.attr('action');
		form.find('[type="submit"]').button('loading');
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: form.serialize(),
		})
		.done(function(rs) {
			if (rs.message) {
				window.location.href = rs.message;
			}
		})
		.fail(function(rs) {
			form.find('[type="submit"]').button('reset');
			rs = $.parseJSON(rs.responseText);
            form_errors_append(form, rs.errors, rs.message);
		})
		.always(function() {
			form.find('[type="submit"]').button('reset');
			console.log("complete");
		});
		
	});
});