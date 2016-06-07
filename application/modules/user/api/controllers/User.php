<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/user_model', 'common_user');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
	}

	public function create_post()
	{
		$data = $this->post();
		$rules = $this->common_user->rules;
		$rules[0]['rules'] .= "|is_unique[{$this->common_user->table}.user_email]";
		$rules[1]['rules'] .= '|required';

		$this->form_validation->set_rules($rules);
		$data['user_pass'] = haspass($data['user_pass']);
		$this->form_validation->set_data($data);

		if ($this->form_validation->run($rules)) {
			$result = $this->common_user->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'User added',
					'id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not add the user'
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
		$user = $this->common_user->get(intval($data['user_id']));

		if ($user) {

			if (strlen($data['user_pass'])) {
				$data['user_pass'] = haspass($data['user_pass']);
			} else {
				$data['user_pass'] = $user['user_pass'];
			}

			$rules = $this->common_user->rules;

			if ($data['user_email'] != $user['user_email']) {
				$rules[0]['rules'] .= "|is_unique[{$this->common_user->table}.user_email]";
			}
			$this->form_validation->set_data($data);
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run($rules)) {
				$result = $this->common_user->update($data, $user['user_id']);
				if ($result) {
					return $this->response([
						'status' => REST_Controller::HTTP_OK,
						'message' => 'User updated',
						'id' => $result
					], REST_Controller::HTTP_OK);
				} else {
					return $this->response([
						'status' => REST_Controller::HTTP_BAD_REQUEST,
						'message' => 'Can\'t not update the user'
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
				'message' => 'User is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function delete_delete()
	{
		$id = intval($this->delete('id'));
		$user = $this->common_user->get($id);
		if ($user) {
			if ($this->common_user->delete_user($id)) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'User deleted',
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not delete the user'
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'User is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function get_group_by_id_get($group_id)
	{
		$group_id = intval($group_id);
		$group = $this->common_user_group->get_by_id($group_id);
		if ($group) {
			$permission = '';
			$group['permission'] = json_decode($group['permission']);
			if (!is_array($group['permission'])) {
				$group['permission'] = (array) $group['permission'];
			}
			foreach ($group['permission'] as $key => $value) {
				$permission .= $key . '|' . $value . "\n";
			}
			$permission = trim($permission,"\n");
			$group['permission'] = $permission;
			return $this->response([
				'status' => REST_Controller::HTTP_OK,
				'data' => $group
			], REST_Controller::HTTP_OK);
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'The group is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function group_create_post()
	{
		$data = $this->post();
		$rules = $this->common_user_group->rules;
		$rules[0]['rules'] .= "|is_unique[{$this->common_user_group->table}.group_name]";

		$this->form_validation->set_rules($rules);
		$this->form_validation->set_data($data);

		if ($this->form_validation->run($rules)) {
			$data['permission'] = explode("\n", $data['permission']);
			$permission = [];
			foreach ($data['permission'] as $perm) {
				$_temp = explode('|', $perm);
				$permission[$_temp[0]] = $_temp[1];
			}
			$data['permission'] = json_encode($permission);
			$result = $this->common_user_group->insert(set_data($data));
			if ($result) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Group added',
					'id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not add the group'
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

	public function group_update_put()
	{
		$data = $this->put();
		$group = $this->common_user_group->get(intval($data['group_id']));

		if ($group) {
			$rules = $this->common_user_group->rules;
			if ($data['group_name'] != $group['group_name']) {
				$rules[0]['rules'] .= "|is_unique[{$this->common_user_group->table}.group_name]";
			}
			$this->form_validation->set_data($data);
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run($rules)) {
				$data['permission'] = explode("\n", $data['permission']);
				$permission = [];
				foreach ($data['permission'] as $perm) {
					$_temp = explode('|', $perm);
					$permission[$_temp[0]] = $_temp[1];
				}
				$data['permission'] = json_encode($permission);
				$result = $this->common_user_group->update($data, $group['group_id']);
				if ($result) {
					return $this->response([
						'status' => REST_Controller::HTTP_OK,
						'message' => 'Group updated',
						'id' => $result
					], REST_Controller::HTTP_OK);
				} else {
					return $this->response([
						'status' => REST_Controller::HTTP_BAD_REQUEST,
						'message' => 'Can\'t not update the group'
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
				'message' => 'Group is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function group_delete_delete()
	{
		$id = intval($this->delete('id'));
		$group = $this->common_user_group->get($id);
		if ($group) {
			if ($this->common_user_group->delete_group($id)) {
				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Group deleted',
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

/* End of file User.php */
/* Location: ./application/modules/user/api/controllers/User.php */