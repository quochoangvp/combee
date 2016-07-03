<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Widget extends Backend_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common/widget_model', 'common_widget');
        $this->load->model('common/widget_type_model', 'common_widget_type');
        $this->load->model('category/common/category_model', 'common_category');
        $this->load->library('pagination');
        $this->per_pager = 7;
        $this->load->js('assets/js/pages/widgets.js');
    }

    public function index($offset = 0)
    {
        $offset = (int) $offset;
        $data['widgets'] = $this->common_widget->get_all_widget($this->per_pager, $offset);
        $total_rows = $this->common_widget->count_rows();

        $config['base_url'] = admin_url('widget/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->per_pager;
        $this->pagination->initialize($config);

        $data['offset'] = $offset;
        $data['limit'] = $this->per_pager;
        $data['total_rows'] = $total_rows;
        $this->load->view('list', $data);
    }

    public function create()
    {
        $data = $this->_get_data_for_form();

        $this->load->view('form', $data);
    }

    public function edit($id)
    {
        $data = $this->_get_data_for_form();
        $id = intval($id);
        $widget = $this->common_widget->get_details($id);
        $widget['config'] = (array) json_decode($widget['config']);

        $widget['layout'] = explode('|', $widget['layout']);
        $widget['user_group_ids'] = explode('|', $widget['user_group_ids']);
        $widget['position_name'] = explode('|', $widget['position_name']);
        $widget['theme'] = explode('|', $widget['theme']);
        $data['widget'] = $widget;

        $this->load->view('form', $data);
    }

    public function config($id, $action = null, $action_id = null)
    {
        $data = $this->_get_data_for_form();
        $id = intval($id);
        $widget = $this->common_widget->get_details($id);
        if (!$widget) {
            show_404();
        }
        switch ($action) {
            case 'create':
                $this->_create_media($widget);
                break;
            case 'edit';
                $this->_edit_media($widget, $action_id);
                break;
            default:
                $_function = '_parse_data_' . $widget['type_name'];
                $widget['offset'] = intval($action);
                $widget = $this->{$_function}($widget);

                $data['categories'] = $this->common_category->get_category_nested();
                $data['widget'] = $widget;
                $this->load->view($widget['type_name'] . '/index', $data);
                break;
        }
    }

    private function _parse_data_nav($data)
    {
        $data['config'] = (array) json_decode($data['config']);
        return $data;
    }

    private function _parse_data_media($data)
    {
        $this->load->model('gallery/common/media_model', 'common_media');
        $per_pager = 6;
        $data['medias'] = $this->common_media->get_all_media_by_widget($data['widget_id'], $per_pager, $data['offset']);
        $total_rows = $this->common_media->count_rows(['widget_id' => $data['widget_id']]);

        $config['base_url'] = admin_url('widget/config/' . $data['widget_id']);
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_pager;
        $this->pagination->initialize($config);

        $data['limit'] = $per_pager;
        $data['total_rows'] = $total_rows;
        return $data;
    }

    private function _create_media($widget)
    {
        $this->load->js('assets/js/pages/media.js');
        $data['widget'] = $widget;
        $this->load->view('media/form', $data);
    }

    private function _edit_media($widget, $media_id)
    {
        $this->load->model('gallery/common/media_model', 'common_media');
        $this->load->js('assets/js/pages/media.js');
        $data['widget'] = $widget;
        $data['media'] = $this->common_media->get($media_id);
        if (!$data['media']) {
            show_404();
        }
        $data['media']['media_config'] = (array) json_decode($data['media']['media_config']);
        $this->load->view('media/form', $data);
    }

    private function _get_data_for_form()
    {
        // Get theme elements
        $this->load->library('file');
        $elements = $this->file->read(THEME_PATH . 'news/elements.json');
        $data['layouts'] = json_decode($elements)->layouts;
        $data['positions'] = array();
        foreach ($data['layouts'] as $layout_name => $layout) {
            $data['positions'] = array_merge($data['positions'], (array) $layout->positions);
        }

        // Get themes list
        $this->load->library('dir');
        $data['themes'] = $this->dir->listDir(THEME_PATH);

        // Get user groups
        $this->load->model('user/common/user_group_model', 'common_group_model');
        $data['user_groups'] = $this->common_group_model->get_all();

        // Get widget type
        $data['types'] = $this->common_widget_type->get_all();
        return $data;
    }

    private function _parse_data_article($data)
    {
        $this->load->js('assets/js/pages/widget_config_article.js');
        $this->load->model('category/common/category_model', 'common_category');
        $data['config'] = json_decode($data['config'], true);
        $data['categories'] = $this->common_category->get_category_nested('publish');
        return $data;
    }

    public function _parse_data_support($data)
    {
        $this->load->js('assets/js/pages/widget_config_support.js');
        $this->load->model('user/common/user_model', 'common_user');
        $data['config'] = json_decode($data['config'], true);
        $data['users'] = $this->common_user->get_all();
        if (isset($data['config']['users'])) {
            $data['supporters'] = $this->common_user->get_in($data['config']['users']);
        }
        return $data;
    }

}

/* End of file Widget.php */
/* Location: ./application/modules/widget/backend/controllers/Widget.php */
