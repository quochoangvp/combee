<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/link_model', 'common_link');
		$this->load->js('js/pages/link.js');
	}

	public function all()
	{
		$this->load->view('list');
	}

	public function create()
	{
		$this->common_link->rules[1]['rules'] .=
			'|is_unique[' . $this->common_link->table . '.'
			. $this->common_link->rules[1]['field'] . ']';

		$data['link_nested'] = $this->common_link->get_link_nested();
		$this->load->view('form', $data);
	}

	public function edit($cate_id)
	{
		$data['link'] = $this->common_link->get_link_by_id($cate_id);
		if (!$data['link']) {
			redirect(admin_url('link/all'));
		}
		$data['link_nested'] = $this->common_link->get_link_nested();
		$this->load->view('form', $data);
	}

}

/* End of file Link.php */
/* Location: ./application/modules/link/backend/controllers/Link.php */