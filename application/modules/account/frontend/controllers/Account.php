<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function logout()
	{
		$this->session->unset_userdata('auth');
		redirect(site_url());
	}
}

/* End of file Account.php */
/* Location: ./application/modules/account/frontend/controllers/Account.php */