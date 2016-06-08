<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/widget_model', 'common_widget');
		$this->load->library('pagination');
		$this->per_pager = 7;
		$this->load->js('js/pages/widgets.js');
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
		// Get theme elements
		$this->load->library('file');
		$elements = $this->file->read(THEME_PATH . 'news/elements.json');
		$data['elements'] = json_decode($elements);

		// Get themes list
		$this->load->library('dir');
		$data['themes'] = $this->dir->listDir(THEME_PATH);

		// Get user groups
		$this->load->model('user/common/user_group_model', 'common_group_model');
		$data['user_groups'] = $this->common_group_model->get_all();
		$this->load->view('form', $data);
	}

}

/* End of file Widget.php */
/* Location: ./application/modules/widget/backend/controllers/Widget.php */