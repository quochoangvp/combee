<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_Controller extends Base_Controller
{

    public $theme;
    public $layout;

    public function __construct()
    {
        parent::__construct();
        $this->layout = 'home';
        $this->theme = 'news';
        $this->load->theme($this->theme);
        $this->output->set_layout($this->layout);
        $this->load->model('widget/common/widget_model', 'common_widget');
        $widgets = $this->common_widget->get_all_widget_frontend();
        foreach ($widgets as $widget) {
            $layouts = explode('|', $widget['layout']);
            $themes = explode('|', $widget['theme']);
            if (in_array($this->layout, $layouts) && in_array($this->theme, $themes)) {
                $_function = '_get_widget_data_' . $widget['type_name'];
                $this->$_function($widget);
            }
        }
    }

    private function _get_widget_data_nav($widget)
    {
        $this->load->model('category/common/category_model', 'common_category');
        $widget_categories = json_decode($widget['config'])->categories;
        $categories = $this->common_category->get_category_nested_frontend($widget_categories);
        $this->load->section($widget['position_name'], ['data' => $categories]);
    }

    private function _get_widget_data_media($widget)
    {
        $this->load->model('gallery/frontend/media_model', 'frontend_media');
        $medias = $this->frontend_media->get_all(['widget_id' => $widget['widget_id']]);
        $media_lenght = count($medias);
        for ($i = 0; $i < $media_lenght; $i++) {
            $medias[$i]['media_config'] = (array) json_decode($medias[$i]['media_config']);
        }
        $this->load->section($widget['position_name'], ['data' => $medias]);
    }

}

/* End of file Frontend_Controller.php */
/* Location: ./application/core/Frontend_Controller.php */
