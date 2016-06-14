<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/gallery_model', 'common_gallery');
	}

	public function create_post()
	{
		$data = $this->post();
		$rules = $this->common_gallery->rules;

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_gallery->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Gallery created',
					'id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not create gallery'
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

	public function update_put()
	{
		$data = $this->put();

		$gallery = $this->common_gallery->get(intval($data['gallery_id']));
		unset($data['gallery_id']);

		if ($gallery) {

			$rules = $this->common_gallery->rules;

			$this->form_validation->set_data($data);
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run($rules)) {

				$result = $this->common_gallery->update(set_data($data), $gallery['gallery_id']);
				if ($result) {
					return $this->response([
						'status' => REST_Controller::HTTP_OK,
						'message' => 'Gallery updated',
					], REST_Controller::HTTP_OK);
				} else {
					return $this->response([
						'status' => REST_Controller::HTTP_BAD_REQUEST,
						'message' => 'Can\'t not update gallery'
					], REST_Controller::HTTP_BAD_REQUEST);
				}

			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Please fill all the fields is required',
					'errors' => form_errors($rules)
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Gallery is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function delete_delete()
	{
		$id = intval($this->delete('id'));
		$gallery = $this->common_gallery->get($id);
		if ($gallery) {
			if ($this->common_gallery->delete($id)) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Gallery deleted',
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not delete the gallery'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Widget is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

}

/* End of file Gallery.php */
/* Location: ./application/modules/gallery/api/controllers/Gallery.php */