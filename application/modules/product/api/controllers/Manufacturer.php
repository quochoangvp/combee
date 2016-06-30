<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturer extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/manufacturer_model', 'common_manufacturer');
	}

	public function index_post()
	{
		$data = $this->post();
		$rules = $this->common_manufacturer->rules;
		$rules[0]['rules'] .= '|is_unique[' . $this->common_manufacturer->table . '.manufacturer_name]';

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($rules)) {
			$result = $this->common_manufacturer->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Manufacturer added',
					'id' => $result,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not add the manufacturer',
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
		$rules = $this->common_manufacturer->rules;
		$id = intval($data['manufacturer_id']);
		$manufacturer = $this->common_manufacturer->get($id);

		if (!$manufacturer) {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'The manufacturer is not found',
			], REST_Controller::HTTP_NOT_FOUND);
		} else {
			unset($data['manufacturer_id']);
		}

		if ($manufacturer['manufacturer_name'] != $data['manufacturer_name']) {
			$rules[0]['rules'] .= '|is_unique[' . $this->common_manufacturer->table . '.manufacturer_name]';
		}

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($rules)) {
			$result = $this->common_manufacturer->update(set_data($data), $id);
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Manufacturer updated',
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not add the manufacturer',
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
		$manufacturer = $this->common_manufacturer->get($id);
		if ($manufacturer) {
			if ($this->common_manufacturer->delete($id)) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not delete the manufacturer'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Manufacturer is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

}

/* End of file Manufacturer.php */
/* Location: ./application/modules/product/api/controllers/Manufacturer.php */