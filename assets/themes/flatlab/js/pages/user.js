$(document).ready(function() {
    $(".form_datetime").datetimepicker({ format: 'yyyy-mm-dd hh:ii:ss' });
    $('#userForm').submit(function(event) {
    	event.preventDefault();
    	var form = $(this);
    	var url = form.attr('action');
        var method = 'POST';
        if (parseInt($('input[name="user_id"]').val()) > 0) {
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

    $('#groupForm form').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        var id = parseInt(form.find('[name="group_id"]').val());
        var url, method;
        if (id > 0) {
            url = form.data('action-update');
            method = 'PUT';
        } else {
            url = form.data('action-create');
            method = 'POST';
        }
        $.ajax({
            url: url,
            type: method,
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

function open_group_edit_popup(id) {
    $.get('/api/user/get_group_by_id/' + id, function(rs) {
        $('#groupForm .modal-title').text('Edit: ' + rs.data.group_name);
        bind_form_data('#groupForm form', rs.data);
        $('#groupForm').modal('show');
    }, 'json');
}

function delete_user(id) {
    var cf = confirm('Do you want delete this user?');
    if (cf) {
        $.ajax({
            url: '/api/user/delete',
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
            alert(rs.message);
        })
        .always(function() {
            // console.log("complete");
        });
    }
}

function delete_group(id) {
    var cf = confirm('Do you want delete this group?');
    if (cf) {
        $.ajax({
            url: '/api/user/group_delete',
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
            alert(rs.message);
        })
        .always(function() {
            // console.log("complete");
        });
    }
}