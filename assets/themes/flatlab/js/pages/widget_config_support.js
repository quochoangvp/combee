function add_new_supporter() {
    var supporter_ids = [];
    $('[data-id]').each(function (index, el) {
        supporter_ids.push($(el).attr('data-id'));
    });
    $('[name="users[]"]').each(function (index, el) {
       if($.inArray($(el).val(), supporter_ids) >= 0) {
           $(el).prop('checked', true);
       } else {
           $(el).prop('checked', false);
       }
    });
    $('#selectSupporter').modal('show');
}

$(document).ready(function () {
    $('#selectSupporter form').submit(function (event) {
        event.preventDefault();
        var users = '{"users":[';
        $('[name="users[]"]').each(function (index, el) {
            if ($(el).is(':checked')) {
                users += '"'+$(el).val()+'",';
            }
        });
        users = users.substr(0, users.length - 1);
        users += ']}';
        var widget_id = $('[name="widget_id"]').val();
        $.ajax({
            url: '/api/widget/save_support_config',
            type: 'POST',
            dataType: 'json',
            data: { config: users, widget_id: widget_id },
        })
        .done(function(rs) {
            location.reload();
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
    })
})