<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/catalog_model', 'common_catalog');
	}

	public function index_post()
	{
		$data = $this->post();
		$rules = $this->common_catalog->rules;

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_catalog->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Catalog created',
					'id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not create catalog'
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

	public function index_put()
	{
		$data = $this->put();

		$catalog = $this->common_catalog->get_catalog_by_id($data['catalog_id']);
		if (!$catalog) {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Catalog is not found or deleted',
			], REST_Controller::HTTP_NOT_FOUND);
		} else {
			$catalog_id = $data['catalog_id'];
			unset($data['catalog_id']);
		}

		$rules = $this->common_catalog->rules;

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_catalog->update(set_data($data), $catalog_id);
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Catalog updated',
					'catalog_id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not update catalog'
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

	public function index_delete()
	{
		$id = (int) $this->delete('id');
		$catalog = $this->common_catalog->get($id);
		if ($catalog) {
			if ($this->common_catalog->delete($id)) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not delete the catalog'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Catalog is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function get_all_get()
	{
		return $this->response(['status' => REST_Controller::HTTP_OK, 'data' => $this->common_catalog->get_all()], REST_Controller::HTTP_OK);
	}

	public function get_all_nested_get()
	{
		return $this->response([
			'status' => REST_Controller::HTTP_OK,
			'data' => $this->common_catalog->get_catalog_nested()
		], REST_Controller::HTTP_OK);
	}

	public function save_order_put()
	{
		$data = $this->put();
		$catalogs = [];
		if (isset($data['catalogs']) && is_array($data['catalogs'])) {
			foreach ($data['catalogs'] as $order => $id) {
				$catalog = [];
				$catalog['catalog_id'] = $id;
				$catalog['sort_order'] = $order+1;
				$catalogs[] = $catalog;
			}
		}
		if ($this->common_catalog->save_multiple_rows($catalogs)) {
			return $this->response([
				'status' => REST_Controller::HTTP_OK,
				'message' => 'Order catalog updated',
			], REST_Controller::HTTP_OK);
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_BAD_REQUEST,
				'message' => 'Can\'t not save catalog order'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}

/* End of file Catalog.php */
/* Location: ./application/modules/product/api/controllers/Catalog.php */