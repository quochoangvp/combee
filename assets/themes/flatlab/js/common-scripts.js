String.prototype.toHtmlEntities = function() {
    return this.replace(/./gm, function(s) {
        return "&#" + s.charCodeAt(0) + ";";
    });
};
String.prototype.capitalizeFirstLetter = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
jQuery.ajaxSetup({
    beforeSend: function() {
        // $('#loader').show();
    },
    complete: function() {
        $('#loader').hide();
    },
    success: function() {
        $('#loader').hide()
    },
    error: function() {
        $('#loader').hide();
    },
    timeout: 30000
});
/*---LEFT BAR ACCORDION----*/
$(function() {
    if ($('#nav-accordion').length > 0) {
        $('#nav-accordion').dcAccordion({
            eventType: 'click',
            autoClose: true,
            saveState: true,
            disableLink: true,
            speed: 'fast',
            showCount: false,
            autoExpand: true,
            //        cookie: 'dcjq-accordion-1',
            classExpand: 'dcjq-current-parent'
        });
    }
});

var Script = function() {

    //    sidebar dropdown menu auto scrolling

    jQuery('#sidebar .sub-menu > a').click(function() {
        var o = ($(this).offset());
        diff = 250 - o.top;
        if (diff > 0)
            $("#sidebar").scrollTo("-=" + Math.abs(diff), 500);
        else
            $("#sidebar").scrollTo("+=" + Math.abs(diff), 500);
    });

    //    sidebar toggle

    $(function() {
        function responsiveView() {
            var wSize = $(window).width();
            if (wSize <= 768) {
                $('#container').addClass('sidebar-close');
                $('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                $('#container').removeClass('sidebar-close');
                $('#sidebar > ul').show();
            }
        }
        $(window).on('load', responsiveView);
        $(window).on('resize', responsiveView);
    });

    $('.icon-reorder').click(function() {
        if ($('#sidebar > ul').is(":visible") === true) {
            $('#main-content').css({
                'margin-left': '0px'
            });
            $('#sidebar').css({
                'margin-left': '-210px'
            });
            $('#sidebar > ul').hide();
            $("#container").addClass("sidebar-closed");
        } else {
            $('#main-content').css({
                'margin-left': '210px'
            });
            $('#sidebar > ul').show();
            $('#sidebar').css({
                'margin-left': '0'
            });
            $("#container").removeClass("sidebar-closed");
        }
    });

    // custom scrollbar
    if ($("#sidebar").length > 0) {
        $("#sidebar").niceScroll({ styler: "fb", cursorcolor: "#e8403f", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled: false, cursorborder: '' });
    }

    //    tool tips
    $('.tooltips').tooltip();

    //    popovers
    $('.popovers').popover();

    $('form *[name]').focus(function() {
        $(this).parents('.form-group').find('.help-block').remove();
        $(this).parents('.has-error').removeClass('has-error');
    });

    if ($(".tagsinput").length > 0) {
        $(".tagsinput").tagsInput({
            'trimValue': true,
            'autocomplete_url' : '/api/tag/get_tags_for_tagsinput',
            'onAddTag': function(tag) {
                $.post('/api/tag/check_tag', { tag_title: tag }, function(rs) {
                    //
                });
            }
        });
    }
    if ($('.tinymce').length > 0) {
        tinymce.init({
            selector: '.tinymce',
            setup: function(editor) {
                editor.on('change', function() {
                    tinymce.triggerSave();
                });
            },
            relative_urls: false,
            remove_script_host: true,
            convert_urls: true,
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager "
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview",
            external_filemanager_path: "/filemanager/",
            filemanager_title: "Responsive Filemanager",
            external_plugins: { "filemanager": "/filemanager/plugin.min.js" }
        });
    }

    $('#nav-accordion>li').each(function(index, el) {
        if ($(el).find('.active').length > 0) {
            $(el).find('>a').addClass('active');
            $(el).find('ul.sub').show();
        }
    });

}();

function form_errors_append(form, error_arr, error_msg = '') {
    $(form).find('.form-message').html(error_msg);
    $(form).find('.help-block').remove();
    $(form).find('[name]').each(function(index, el) {
        var attr_name = $(el).attr('name');
        attr_name = attr_name.replace('[', '');
        attr_name = attr_name.replace(']', '');
        if (error_arr[attr_name]) {
            $(el).after(error_arr[attr_name]);
            $(el).parent().parent().addClass('has-error');
        }
    });
}

function select_option_on_selectbox() {
    $('select').each(function(index, select) {
        var id = $(select).data('select');
        if (id) {
            $(select).find('option').each(function(i, option) {
                if ($(option).attr('value') == id) {
                    $(option).attr('selected', 'selected');
                }
            });
        }
    });
}

function general_slug(el, el_to_insert) {
    var text = $(el).val();
    if ($('[name="' + el_to_insert + '"]').val().length == 0) {
        $('[name="' + el_to_insert + '"]').val(string_to_url(text));
    }
}

function string_to_url(str) {
    str = str.toLowerCase()
        .replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a")
        .replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e")
        .replace(/ì|í|ị|ỉ|ĩ/g, "i")
        .replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o")
        .replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u")
        .replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y")
        .replace(/đ/g, "d")
        .trim()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
    return str;
}

function bind_form_data(form, data) {
    $(form).find('*').each(function() {
        if ($(this).attr('name')) {
            if (typeof data[$(this).attr('name')] != 'undefined') {
                if ($(this).attr('type') == 'radio' || $(this).attr('type') == 'checkbox') {
                    if ($(this).val() == data[$(this).attr('name')]) {
                        $(this).attr('checked', 'checked');
                    }
                } else {
                    $(this).val(data[$(this).attr('name')]);
                }
            }
        }
    });
}
