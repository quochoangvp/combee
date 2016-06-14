<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/widget_model', 'common_widget');
		$this->load->model('common/widget_type_model', 'common_widget_type');
		$this->load->library('pagination');
		$this->per_pager = 7;
		$this->load->js('js/pages/widgets.js');
		$this->load->css('assets/bootstrap-fileupload/bootstrap-fileupload.css');
	}

	public function index($offset = 0)
	{
		$data['widgets'] = $this->common_widget->get_all_widget($this->per_pager, $offset);
		$total_rows = $this->common_widget->count_rows();

        $config['base_url'] = admin_url('widget');
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
		$widget = $this->common_widget->get($id);

		$widget['layout'] = explode('|', $widget['layout']);
		$widget['user_group_ids'] = explode('|', $widget['user_group_ids']);
		$widget['position_name'] = explode('|', $widget['position_name']);
		$widget['theme'] = explode('|', $widget['theme']);
		$data['widget'] = $widget;

		$this->load->view('form', $data);
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

}

/* End of file Widget.php */
/* Location: ./application/modules/widget/backend/controllers/Widget.php */