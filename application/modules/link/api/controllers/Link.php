<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/link_model', 'common_link');
	}

	public function get_all_get()
	{
		return $this->response(['status' => REST_Controller::HTTP_OK, 'data' => $this->common_link->get_all()], REST_Controller::HTTP_OK);
	}

	public function get_all_nested_get()
	{
		return $this->response([
			'status' => REST_Controller::HTTP_OK,
			'data' => $this->common_link->get_link_nested()
		], REST_Controller::HTTP_OK);
	}

	public function create_post()
	{
		$data = $this->post();
		$rules = $this->common_link->rules;

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_link->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'link created',
					'id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not create link'
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
		if (!isset($data['is_show'])) {
			$data['is_show'] = 'n';
		}

		$link = $this->common_link->get_link_by_id($data['link_id']);
		if (!$link) {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'link is not found or deleted',
			], REST_Controller::HTTP_NOT_FOUND);
		} else {
			$link_id = $data['link_id'];
			unset($data['link_id']);
		}

		$rules = $this->common_link->rules;

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_link->update(set_data($data), $link_id);
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Link updated',
					'link_id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not update link'
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

	public function save_order_put()
	{
		$data = $this->put();
		$links = [];
		if (isset($data['links']) && is_array($data['links'])) {
			foreach ($data['links'] as $order => $id) {
				$link = [];
				$link['link_id'] = $id;
				$link['position'] = $order+1;
				$links[] = $link;
			}
		}
		if ($this->common_link->save_multiple_rows($links)) {
			return $this->response([
				'status' => REST_Controller::HTTP_OK,
				'message' => 'Order link updated',
			], REST_Controller::HTTP_OK);
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_BAD_REQUEST,
				'message' => 'Can\'t not save link order'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}

/* End of file Link.php */
/* Location: ./application/modules/link/api/controllers/Link.php */