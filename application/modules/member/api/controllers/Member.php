<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/user_model', 'common_user');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
	}

	public function login_post()
	{
		$data = $this->post();
		$rules = $this->common_user->rules_login;

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {
			$user_exist = $this->common_user->get_user_by_email($data['user_email']);
			if ($user_exist) {
				$user_data = $this->common_user->login($data['user_email'], $data['user_pass']);
				if ($user_data) {
					if(isset($data['remember_login'])) {
						$_data['new_expiration'] = 60*60*24*30;//30 days
						$this->session->sess_expiration = $_data['new_expiration'];
					}
					$this->session->set_userdata(['auth' => $user_data]);
					if ($this->common_user->get_role($user_data['role']) == 'admin') {
						$url = admin_url('dashboard');
					} else {
						$url = site_url('account/profile');
					}
					return $this->response([
						'status' => REST_Controller::HTTP_OK,
						'message' => $url
					], REST_Controller::HTTP_OK);
				} else {
					return $this->response([
						'status' => REST_Controller::HTTP_BAD_REQUEST,
						'message' => 'Email or password is incorrect'
					], REST_Controller::HTTP_BAD_REQUEST);
				}
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_NOT_FOUND,
					'message' => 'Member is not exist or has been deleted'
				], REST_Controller::HTTP_NOT_FOUND);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_BAD_REQUEST,
				'message' => 'Please fill all the fields is required',
				'errors' => form_errors($rules)
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function logout_get()
	{
		$this->session->unset_userdata('auth');
		return $this->response([
			'status' => REST_Controller::HTTP_OK,
			'message' => site_url()
		], REST_Controller::HTTP_OK);
	}

}

/* End of file Member.php */
/* Location: ./application/modules/member/api/controllers/Member.php */