function open_popup_select_categories(index) {
	$('[name="index"]').val(index);
	var title = $('[data-title-'+index+']').attr('data-title-'+index);
	var list = $('[data-list-categories-'+index+']').attr('data-list-categories-'+index);
	list = list.split('|');
	$('#chooseCategories').find('[name="title"]').val(title);
	$('[name="category[]"]').each(function(index, el) {
		if ($.inArray($(el).val(), list)>=0) {
			$(el).prop('checked', 'checked');
		}
	});
	$('#chooseCategories').modal('show');
}

$(document).ready(function() {
	$('#chooseCategories form').submit(function(event) {
		event.preventDefault();
		var form = $(this);
		var category = '';
		$.each($(form).find('[name="category[]"]'), function(index, el) {
			if ($(el).is(':checked')) {
				if (category.length > 0) {
					category += '|' + $(el).val();
				} else {
					category = $(el).val();
				}
			}
		});
		var index = $(form).find('[name="index"]').val();
		var title = $(form).find('[name="title"]').val();
		if (index > 0) {
			$('[data-title-'+index+']').attr('data-title-'+index, title);
			$('[data-title-'+index+']').text(title);
			$('[data-list-categories-'+index+']').attr('data-list-categories-'+index, category);
			$('[data-list-categories-'+index+']').text(category);
		} else {
			var _index = $('#table_article_config tbody tr').length;
			var row = $('#rowTemplate tbody').html();
			row = row.split('{{index}}').join(_index);
			row = row.split('{{title}}').join(title);
			row = row.split('{{categories}}').join(category);
			row = row.split('{{index+1}}').join(_index+1);
			$('#table_article_config tbody').append(row);
		}
		_do_save_config();
	});
});

function add_new_article_config() {
	$('#chooseCategories').find('[name="title"]').val('');
	$('#chooseCategories').find('[name="category[]"]').each(function(index, el) {
		$(el).prop('checked', false);
	});
	$('#chooseCategories').modal('show');
}

function delete_config(index) {
	var cf = confirm('Do you want to delete this config?');
	if (cf) {
		$('#table_article_config tbody tr#index_' + index).remove();
		_do_save_config();
	}
}

function _do_save_config() {
	var list = $('#table_article_config tbody tr');
	var list_length = list.length;
	var config = '{"list":[';
	list.each(function(i, el) {
		config += '{"title":"'+$('[data-title-'+i+']').attr('data-title-'+i)+'","categories":"'+$('[data-list-categories-'+i+']').attr('data-list-categories-'+i)+'"}';
		if (i<list_length-1) {
			config += ',';
		}
	});
	config += ']}';
	var widget_id = $('[name="widget_id"]').val();
	$.ajax({
		url: '/api/widget/save_article_config',
		type: 'POST',
		dataType: 'json',
		data: { config: config, widget_id: widget_id },
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
}