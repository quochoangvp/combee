$(document).ready(function() {

    $('.sortable').sortable({
        axis: 'y',
        connectWith: '.sortable',
        update: function(event, ui) {
            $('.sortable').css('opacity', '0.1');
            var data = $(this).sortable('serialize');
            $.ajax({
                url: '/api/link/save_order',
                type: 'PUT',
                dataType: 'json',
                data: data,
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                $('.sortable').css('opacity', '1');
            });

        }
    });
    $('.sortable').disableSelection();

    $('form[method="post"]').submit(function(event) {
        event.preventDefault();
        $(this).find('.help-block').remove();
        $(this).find('.alert').remove();
        $(this).find('.has-error').removeClass('has-error');
        var form = $(this);
        var url = form.attr('action');
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

    get_all_link_nested();

    select_option_on_selectbox();
});

function get_all_link_nested() {
    var url = $('#linkListTemplate').data('url');
    $.get(url, function(data) {
        $('#linkList').html(general_option_nested(data.data));
    });
}

function general_option_nested(nested_array, level = 0) {
    if (!nested_array) return;
    var sp = '---- ';
    var options = '';
    var sp = sp.repeat(level);
    var template = $('#linkListTemplate').html();
    $.each(nested_array, function(index, nested) {
        if (nested['is_show'] == 'y') {
            nested['is_show'] = 'success';
        } else {
            nested['is_show'] = 'default';
        }
        options += template.split('{{title}}').join(sp + nested['link_title']).split('{{id}}').join(nested['link_id']).split('{{is_show}}').join(nested['is_show']);
        if (nested['children']) {
            level++;
            if (nested['parent_id'] == 0) {
                level = 1;
            }
            options += general_option_nested(nested['children'], level);
        }
    });
    return options;
}

function go_to_link_edit_page(cate_id) {
    window.location.href = '/admin/link/edit/' + cate_id;
}

function go_to_link_page() {
    window.location.href = '/admin/link/all';
}

function delete_link(id) {
    var cf = confirm('Do you want to delete this link?');
    if (cf) {
        $.ajax({
                url: '/api/link/delete',
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
