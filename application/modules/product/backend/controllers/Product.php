<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Backend_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('common/product_model', 'common_product');
	}

	public function index() {
		$data['products'] = $this->common_product->get_all_product();
        $this->load->view('product/product/list', $data);
	}

    public function create()
    {
        $this->load->view('product/product/form');
    }

}

/* End of file Product.php */
/* Location: ./application/modules/product/backend/controllers/Product.php */