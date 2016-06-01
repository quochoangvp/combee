$(document).ready(function() {
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

    get_all_category_nested();

    select_option_on_selectbox();
});

function get_all_category_nested() {
    var url = $('#categoryListTemplate').data('url');
    $.get(url, function(data) {
        $('#categoryList').html(general_option_nested(data.data));
    });
}

function general_option_nested(nested_array, level = 0) {
    if (!nested_array) return;
    var sp = '---- ';
    var options = '';
    var sp = sp.repeat(level);
    var template = $('#categoryListTemplate').html();
    $.each(nested_array, function(index, nested) {
        options += template.split('{{name}}').join(sp + nested['category_title']).split('{{id}}').join(nested['category_id']).split('{{status}}').join(nested['status'].capitalizeFirstLetter());
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

function category_save_order() {
    // body...
}

function go_to_category_edit_page(cate_id) {
    window.location.href = '/admin/category/edit/' + cate_id;
}

function go_to_category_page() {
    window.location.href = '/admin/category/all';
}

function delete_category(cate_id) {
    // body...
}