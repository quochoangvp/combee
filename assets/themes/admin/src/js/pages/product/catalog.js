$(document).ready(function() {

    $('.sortable').sortable({
        axis: 'y',
        connectWith: '.sortable',
        update: function(event, ui) {
            $('.sortable').css('opacity', '0.1');
            var data = $(this).sortable('serialize');
            $.ajax({
                url: '/api/product/catalog/save_order',
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
        var method = 'POST';
        if ($('input[name="catalog_id"]').val()) {
            method = 'PUT';
        }
        $.ajax({
            url: url,
            type: method,
            dataType: 'json',
            data: form.serialize(),
        })
        .done(function(rs) {
            var message = '<div class="alert alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-remove"></i></button><strong>Success!</strong> ' + rs.message + '</div>';
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
            form.prepend('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-remove"></i></button><strong>Oh snap!</strong> ' + rs.message + '</div>');
            if (rs.errors) {
                form_errors_append(form, rs.errors);
            }
        })
        .always(function(rs) {
            //
        });
    });

    get_all_catalog_nested();

    select_option_on_selectbox();
});

function get_all_catalog_nested() {
    var url = $('#catalogListTemplate').data('url');
    $.get(url, function(data) {
        $('#catalogList').html(general_option_nested(data.data));
    });
}

function general_option_nested(nested_array, level = 0) {
    if (!nested_array) return;
    var sp = '---- ';
    var options = '';
    var sp = sp.repeat(level);
    var template = $('#catalogListTemplate').html();
    $.each(nested_array, function(index, nested) {
        options += template.split('{{name}}').join(sp + nested['catalog_name']).split('{{id}}').join(nested['catalog_id']);
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

function go_to_catalog_edit_page(id) {
    window.location.href = '/admin/product/catalog/edit/' + id;
}

function go_to_catalog_page() {
    window.location.href = '/admin/product/catalog';
}

function delete_catalog(id) {
    var cf = confirm('Do you want to delete this catalog?');
    if (cf) {
        $.ajax({
            url: '/api/product/catalog',
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