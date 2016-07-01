<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/attribute_model', 'common_attribute');
		$this->load->js('assets/js/pages/product/attribute.js');
	}

	public function index()
	{
		$data['attributes'] = $this->common_attribute->get_attribute_nested();
		$data['groups'] = $this->common_attribute_group->get_all();
		$this->load->view('attribute/list', $data);
	}

}

/* End of file Attribute.php */
/* Location: ./application/modules/product/backend/controllers/Attribute.php */