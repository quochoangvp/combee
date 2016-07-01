function open_create_group_popup() {
	$('#group_form .modal-title').text('Create new attribute group');
	$('#group_form').modal('show');
}

$(document).ready(function() {
	$('#group_form form').submit(function(event) {
		event.preventDefault();
		var method = 'POST';
		var form = $(this);
		if (parseInt($(form).find('input[name="group_id"]').val()) > 0) {
			method = 'PUT';
		}
		$.ajax({
            url: '/api/product/attribute/group',
            type: method,
            dataType: 'json',
            data: form.serialize(),
        })
        .done(function(rs) {
        	if (rs.message) {
        		alert(rs.message);
        	} else {
        		location.reload();
        	}
        })
        .fail(function(rs) {
            rs = $.parseJSON(rs.responseText);
            if (rs.message) {
            	alert(rs.message);
            }
        })
        .always(function() {
            console.log("complete");
        });
	});
});

function open_edit_group_popup(id) {
    $.get('/api/product/attribute/group?id='+id, function(rs) {
        $('#group_form .modal-title').text('Edit: ' + rs.data.group_name);
        bind_form_data('#group_form form', rs.data);
        $('#group_form').modal('show');
    }, 'json');
}

function confirm_delete_group(id) {
	var cf = confirm('Do you want to delete this group?');
    if (cf) {
        $.ajax({
            url: '/api/product/attribute/group',
            type: 'DELETE',
            dataType: 'json',
            data: { id: id },
        })
        .done(function(rs) {
            if (rs.message) {
                alert(rs.message);
            } else {
                location.reload();
            }
        })
        .fail(function(rs) {
            if (!rs.message) {
                rs.message = 'An error occurred';
            }
            alert(rs.message);
        })
        .always(function() {
            console.log("complete");
        });
    }
}

function open_create_attr_popup() {
	$('#attribute_form .modal-title').text('Create new attribute group');
	$('#attribute_form').modal('show');
}

$(document).ready(function() {
	$('#attribute_form form').submit(function(event) {
		event.preventDefault();
		var method = 'POST';
		var form = $(this);
		if (parseInt($(form).find('input[name="attr_id"]').val()) > 0) {
			method = 'PUT';
		}
		$.ajax({
            url: '/api/product/attribute',
            type: method,
            dataType: 'json',
            data: form.serialize(),
        })
        .done(function(rs) {
        	if (rs.message) {
        		alert(rs.message);
        	} else {
        		location.reload();
        	}
        })
        .fail(function(rs) {
            rs = $.parseJSON(rs.responseText);
            if (rs.message) {
            	alert(rs.message);
            }
        })
        .always(function() {
            console.log("complete");
        });
	});
});