<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/category_model', 'common_category');
		$this->load->js('js/pages/category.js');
	}

	public function all()
	{
		$this->load->view('list_category');
	}

	public function create()
	{
		$this->common_category->rules[1]['rules'] .=
			'|is_unique[' . $this->common_category->table . '.'
			. $this->common_category->rules[1]['field'] . ']';

		$data['category_nested'] = $this->common_category->get_category_nested();
		$this->load->view('form_category', $data);
	}

	public function edit($cate_id)
	{
		$data['category'] = $this->common_category->get_category_by_id($cate_id);
		if (!$data['category']) {
			redirect(admin_url('category/all'));
		}
		$data['category_nested'] = $this->common_category->get_category_nested();
		$this->load->view('form_category', $data);
	}

}

/* End of file Category.php */
/* Location: ./application/modules/category/backend/controllers/Category.php */