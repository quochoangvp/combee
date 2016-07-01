<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/catalog_model', 'common_catalog');
		$this->load->js('assets/js/pages/product/catalog.js');
	}

	public function index()
	{
		$this->load->view('catalog/list');
	}

	public function create()
	{
		$data['catalog_nested'] = $this->common_catalog->get_catalog_nested();
		$this->load->view('catalog/form', $data);
	}

	public function edit($id)
	{
		$data['catalog'] = $this->common_catalog->get_catalog_by_id($id);
		if (!$data['catalog']) {
			redirect(admin_url('product/catalog'));
		}
		$data['catalog_nested'] = $this->common_catalog->get_catalog_nested();
		$this->load->view('catalog/form', $data);
	}

}

/* End of file Catalog.php */
/* Location: ./application/modules/product/backend/controllers/Catalog.php */