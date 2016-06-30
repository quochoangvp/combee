<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/brand_model', 'common_brand');
	}

	public function index_post()
	{
		$data = $this->post();
		$rules = $this->common_brand->rules;
		$rules[0]['rules'] .= '|is_unique[' . $this->common_brand->table . '.brand_name]';

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($rules)) {
			$result = $this->common_brand->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Brand added',
					'id' => $result,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not add the brand',
				], REST_Controller::HTTP_BAD_REQUEST);
			}

		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_BAD_REQUEST,
				'message' => 'Please fill all the fields is required',
				'errors' => form_errors($rules),
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$data = $this->put();
		$rules = $this->common_brand->rules;
		$id = intval($data['brand_id']);
		$brand = $this->common_brand->get($id);

		if (!$brand) {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'The brand is not found',
			], REST_Controller::HTTP_NOT_FOUND);
		} else {
			unset($data['brand_id']);
		}

		if ($brand['brand_name'] != $data['brand_name']) {
			$rules[0]['rules'] .= '|is_unique[' . $this->common_brand->table . '.brand_name]';
		}

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($rules)) {
			$result = $this->common_brand->update(set_data($data), $id);
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Brand updated',
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not add the brand',
				], REST_Controller::HTTP_BAD_REQUEST);
			}

		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_BAD_REQUEST,
				'message' => 'Please fill all the fields is required',
				'errors' => form_errors($rules),
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_delete()
	{
		$id = (int) $this->delete('id');
		$brand = $this->common_brand->get($id);
		if ($brand) {
			if ($this->common_brand->delete($id)) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not delete the brand'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Brand is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

}

/* End of file Brand.php */
/* Location: ./application/modules/product/api/controllers/Brand.php */