<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/category_model', 'common_category');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
	}

	public function create_post()
	{
		$data = $this->post();
		$rules = $this->common_category->rules;

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_category->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Category created',
					'id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not create category'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_BAD_REQUEST,
				'message' => 'Please fill all the fields is required',
				'errors' => form_errors($rules)
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function update_post()
	{
		$data = $this->post();

		$category = $this->common_category->get_category_by_id($data['category_id']);
		if (!$category) {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Category is not found or deleted',
			], REST_Controller::HTTP_NOT_FOUND);
		} else {
			$category_id = $data['category_id'];
			unset($data['category_id']);
		}

		$rules = $this->common_category->rules;

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_category->update(set_data($data), $category_id);
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Category updated',
					'category_id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not update category'
				], REST_Controller::HTTP_BAD_REQUEST);
			}

		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_BAD_REQUEST,
				'message' => 'Please fill all the fields is required',
				'errors' => form_errors($rules)
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function get_all_get()
	{
		return $this->response(['status' => REST_Controller::HTTP_OK, 'data' => $this->common_category->get_all()], REST_Controller::HTTP_OK);
	}

	public function get_all_nested_get()
	{
		return $this->response([
			'status' => REST_Controller::HTTP_OK,
			'data' => $this->common_category->get_category_nested()
		], REST_Controller::HTTP_OK);
	}

}

/* End of file Category.php */
/* Location: ./application/modules/category/api/controllers/Category.php */