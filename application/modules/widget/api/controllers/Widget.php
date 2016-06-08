<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/widget_model', 'common_widget');
	}

	public function create_post()
	{
		$data = $this->post();
		$layouts = '';
		if (isset($data['layout']) && is_array($data['layout']) && count($data['layout']) > 0) {
			foreach ($data['layout'] as $layout) {
				if (strlen($layouts) > 0) {
					$layouts .= '|' . $layout;
				} else {
					$layouts = $layout;
				}
			}
		}
		$data['layout'] = $layouts;

		$themes = '';
		if (isset($data['theme']) && is_array($data['theme']) && count($data['theme']) > 0) {
			foreach ($data['theme'] as $theme) {
				if (strlen($themes) > 0) {
					$themes .= '|' . $theme;
				} else {
					$themes = $theme;
				}
			}
		}
		$data['theme'] = $themes;

		$user_groups = '';
		if (isset($data['user_group_ids']) && is_array($data['user_group_ids']) && count($data['user_group_ids']) > 0) {
			foreach ($data['user_group_ids'] as $user_group_id) {
				if (strlen($user_groups) > 0) {
					$user_groups .= '|' . $user_group_id;
				} else {
					$user_groups = $user_group_id;
				}
			}
		}
		$data['user_group_ids'] = $user_groups;

		$position_name = '';
		if (isset($data['position_name']) && is_array($data['position_name']) && count($data['position_name']) > 0) {
			foreach ($data['position_name'] as $name) {
				if (strlen($position_name) > 0) {
					$position_name .= '|' . $name;
				} else {
					$position_name = $name;
				}
			}
		}
		$data['position_name'] = $position_name;

		$rules = $this->common_widget->rules;

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {

			$result = $this->common_widget->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Widget created',
					'id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not create widget'
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

}

/* End of file Widget.php */
/* Location: ./application/modules/widget/api/controllers/Widget.php */