<?php

function array_uniqueif($array, $attr, $attr_to_keep = null)
{
    $result = [];
    $tmp = [];
    foreach ($array as $k => $v) {
        $v = (object) $v;
        if (!in_array($v->{$attr}, $tmp)) {
            if ($attr_to_keep) {
                if (in_array($attr_to_keep, array_keys((array) $v))) {
                    $tmp[] = $v->{$attr};
                    $result[] = $v;
                }
            } else {
                $tmp[] = $v->{$attr};
                $result[] = $v;
            }
        }
    }
    return $result;
}

function admin_url($url = '')
{
    return site_url('admin/' . $url);
}

function form_errors($fields)
{
    $result = [];
    foreach ($fields as $field) {
        if (strlen(form_error($field['field'])) > 0) {
            $result[$field['field']] = form_error($field['field']);
        }
    }
    return $result;
}

function set_data($data)
{
    $result = [];
    foreach ($data as $key => $value) {
        if (is_string($value) && is_object(json_decode($value))) {
            $result[$key] = $value;
        } else {
            $result[$key] = set_value($key);
        }
    }
    return $result;
}

function general_option_nested($nested_array, $id, $title, $level = 0)
{
    $sp = '-- ';
    $options = '';
    $sp = str_repeat($sp, $level);
    foreach ($nested_array as $nested) {
        $options .= '<option value="' . $nested[$id] . '">' . $sp . $nested[$title] . '</option>' . PHP_EOL;

        if (isset($nested['children'])) {
            $level++;
            if ($nested['parent_id'] == 0) {
                $level = 1;
            }
            $options .= general_option_nested($nested['children'], $id, $title, $level);
        }
    }
    return $options;
}

function general_checkbox_nested($nested_array, $current_array = [], $id, $title, $input_name, $level = 0)
{
    if (!is_array($current_array)) {
        $current_array = (array) $current_array;
    }
    $sp = '---- ';
    $list = '';
    $sp = str_repeat($sp, $level);
    foreach ($nested_array as $nested) {
        $list .= '<div><label>' . $sp . '<input type="checkbox" data-parent="' . $nested['parent_id'] . '" name="' . $input_name . '[]" value="' . $nested[$id] . '"';
        if (in_array($nested[$id], $current_array)) {
            $list .= ' checked';
        }
        $list .= '> ' . $nested[$title] . '</label></div>';

        if (isset($nested['children'])) {
            $level++;
            if ($nested['parent_id'] == 0) {
                $level = 1;
            }
            $list .= general_checkbox_nested($nested['children'], $current_array, $id, $title, $input_name, $level);
        }
    }
    return $list;
}

function haspass($pass_origin)
{
    return md5($pass_origin);
}

function string_to_url($str)
{
    $str = strtolower($str);
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/ /", '-', $str);
    $str = preg_replace("/[^\w-]+/", '', $str);
    return trim($str, '-');
}

function is_admin()
{
    $CI = &get_instance();
    $auth = $CI->session->userdata('auth');
    if (!isset($auth['permission'])) {
        return false;
    }
    $permission = (array) json_decode($auth['permission']);
    if (isset($permission['can_view_admincp']) && $permission['can_view_admincp'] == 'yes') {
        return true;
    }
    return false;
}

function limit_to_numwords($str, $numwords)
{
    $excerpt = explode(' ', $str, $numwords + 1);
    if (count($excerpt) >= $numwords) {
        array_pop($excerpt);
    }
    $excerpt = implode(' ', $excerpt);
    return $excerpt;
}
