<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->unset_layout();
		$this->load->model('user/common/user_model', 'common_user');
		if ($auth = $this->session->userdata('auth')) {
			if (is_admin()) {
				redirect(admin_url('dashboard'));
			} else {
				redirect(site_url('account/profile'));
			}
		}
	}

	public function login()
	{
		$data['title'] = 'Login';
		$this->load->view('login', $data);
	}

}

/* End of file Member.php */
/* Location: ./application/modules/member/frontend/controllers/Member.php */