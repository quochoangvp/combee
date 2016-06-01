<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Backend_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('backend/index');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/frontend/controllers/Dashboard.php */