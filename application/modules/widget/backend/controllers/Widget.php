<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/widget_model', 'common_widget');
		$this->load->library('pagination');
		$this->per_pager = 7;
		$this->load->js('js/pages/article.js');
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

}

/* End of file Widget.php */
/* Location: ./application/modules/widget/backend/controllers/Widget.php */