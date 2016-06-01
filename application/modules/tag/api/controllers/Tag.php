<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/tag_model', 'common_tag');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
	}

	public function create_post()
	{
		$data = $this->post();
		$rules = $this->common_tag->rules;
		$rules[0]['rules'] .= '|is_unique[' . $this->common_tag->table . '.tag_title]';
		$rules[1]['rules'] .= '|is_unique[' . $this->common_tag->table . '.tag_url]';

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_tag->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Tag created',
					'id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not create tag'
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
		$rules = $this->common_tag->rules;

		$id = intval($data['tag_id']);
		$tag = $this->common_tag->get_by_id($id);

		if (!$tag) {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'The tag is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		} else {
			unset($data['tag_id']);
		}

		if ($data['tag_title'] !== $tag['tag_title']) {
			$rules[0]['rules'] .= '|is_unique[' . $this->common_tag->table . '.tag_title]';
		}
		
		if ($data['tag_url'] !== $tag['tag_url']) {
			$rules[0]['rules'] .= '|is_unique[' . $this->common_tag->table . '.tag_url]';
		}

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_tag->update(set_data($data), $id);
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Tag updated',
					'id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not update tag'
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

	public function get_by_id_get($id)
	{
		$id = intval($id);
		$tag = $this->common_tag->get_by_id($id);
		if ($tag) {
			return $this->response([
				'status' => REST_Controller::HTTP_OK,
				'data' => $tag
			], REST_Controller::HTTP_OK);
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'The tag is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function get_tags_by_keyword_get()
	{
		$keyword = trim(strip_tags($this->get('term')));
		$tags = $this->common_tag->get_tags_by_keyword($keyword);
		return $this->response([
			'status' => REST_Controller::HTTP_OK,
			'data' => $tags
		], REST_Controller::HTTP_OK);
	}

	public function get_tags_for_tagsinput_get()
	{
		$keyword = trim(strip_tags($this->get('term')));
		$tags = $this->common_tag->get_tags_by_keyword($keyword);
		$result = [];
		if ($tags && count($tags) > 0) {
			foreach ($tags as $tag) {
				$result[$tag['tag_id']] = $tag['tag_title'];
			}
		}
		return $this->response($result, REST_Controller::HTTP_OK);
	}

	public function check_tag_post()
	{
		$tag_title = trim($this->post('tag_title'));
		if ($this->common_tag->get(['tag_title' => $tag_title])) {
			$this->response($result, REST_Controller::HTTP_OK);
		} else {
			$result = $this->common_tag->insert(['tag_title' => $tag_title, 'tag_url' => string_to_url($tag_title)]);
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not create the tag'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

}

/* End of file Tag.php */
/* Location: ./application/modules/tag/api/controllers/Tag.php */