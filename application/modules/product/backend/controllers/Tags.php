<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends Backend_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('common/product_tag_model', 'common_product_tag');
		$this->load->js('assets/js/pages/product/tag.js');
	}

	public function index() {
		$data['tags'] = $this->common_product_tag->get_all_tags();
		$this->load->view('tags/list', $data);
	}

}

/* End of file Tags.php */
/* Location: ./application/modules/product/backend/controllers/Tags.php */