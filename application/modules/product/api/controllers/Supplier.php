<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/supplier_model', 'common_supplier');
	}

	public function index_post()
	{
		$data = $this->post();
		$rules = $this->common_supplier->rules;
		$rules[0]['rules'] .= '|is_unique[' . $this->common_supplier->table . '.supplier_name]';
		$rules[2]['rules'] .= '|is_unique[' . $this->common_supplier->table . '.supplier_email]';

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($rules)) {
			$result = $this->common_supplier->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Supplier added',
					'id' => $result,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not add the supplier',
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
		$rules = $this->common_supplier->rules;
		$id = intval($data['supplier_id']);
		$supplier = $this->common_supplier->get($id);

		if (!$supplier) {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'The supplier is not found',
			], REST_Controller::HTTP_NOT_FOUND);
		} else {
			unset($data['supplier_id']);
		}

		if ($supplier['supplier_name'] != $data['supplier_name']) {
			$rules[0]['rules'] .= '|is_unique[' . $this->common_supplier->table . '.supplier_name]';
		}
		if ($supplier['supplier_email'] != $data['supplier_email']) {
			$rules[2]['rules'] .= '|is_unique[' . $this->common_supplier->table . '.supplier_email]';
		}

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run($rules)) {
			$result = $this->common_supplier->update(set_data($data), $id);
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Supplier updated',
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not add the supplier',
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
		$supplier = $this->common_supplier->get($id);
		if ($supplier) {
			if ($this->common_supplier->delete($id)) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Supplier deleted',
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not delete the supplier'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Supplier is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

}

/* End of file Supplier.php */
/* Location: ./application/modules/product/api/controllers/Supplier.php */