<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/attribute_model', 'common_attribute');
		$this->load->model('common/attribute_group_model', 'common_attribute_group');
	}

	public function index_get()
	{
		$id = (int) $this->get('id');
		$attribute = $this->common_attribute->get($id);
		if ($attribute) {
			$this->response([
				'status' => REST_Controller::HTTP_OK,
				'data' => $attribute
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Attribute is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_post()
	{
		$data = $this->post();
		$rules = $this->common_attribute->rules;
		$rules[0]['rules'] .= '|is_unique[' . $this->common_attribute->table . '.attr_name]';

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_attribute->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'id' => $result,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not add the attribute',
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


	public function group_put()
	{
		$data = $this->put();
		$group_id = (int) $data['group_id'];
		$group = $this->common_attribute_group->get($group_id);
		if (!$group) {
			$this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Group is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		} else {
			unset($data['group_id']);
		}

		$rules = $this->common_attribute_group->rules;
		if ($data['group_name'] != $group['group_name']) {
			$rules[0]['rules'] .= '|is_unique[' . $this->common_attribute_group->table . '.group_name]';
		}

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_attribute_group->update(set_data($data), $group_id);
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not update the group',
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

	public function group_delete()
	{
		$id = (int) $this->delete('id');
		$group = $this->common_attribute_group->get($id);
		if ($group) {
			if ($this->common_attribute_group->delete($id)) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not delete the group'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Group is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function group_get()
	{
		$id = (int) $this->get('id');
		$group = $this->common_attribute_group->get($id);
		if ($group) {
			$this->response([
				'status' => REST_Controller::HTTP_OK,
				'data' => $group
			], REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Group is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function group_post()
	{
		$data = $this->post();
		$rules = $this->common_attribute_group->rules;
		$rules[0]['rules'] .= '|is_unique[' . $this->common_attribute_group->table . '.group_name]';

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_attribute_group->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'id' => $result,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not add the group',
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


	public function group_put()
	{
		$data = $this->put();
		$group_id = (int) $data['group_id'];
		$group = $this->common_attribute_group->get($group_id);
		if (!$group) {
			$this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Group is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		} else {
			unset($data['group_id']);
		}

		$rules = $this->common_attribute_group->rules;
		if ($data['group_name'] != $group['group_name']) {
			$rules[0]['rules'] .= '|is_unique[' . $this->common_attribute_group->table . '.group_name]';
		}

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_attribute_group->update(set_data($data), $group_id);
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not update the group',
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

	public function group_delete()
	{
		$id = (int) $this->delete('id');
		$group = $this->common_attribute_group->get($id);
		if ($group) {
			if ($this->common_attribute_group->delete($id)) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not delete the group'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Group is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

}

/* End of file Attribute.php */
/* Location: ./application/modules/product/api/controllers/Attribute.php */