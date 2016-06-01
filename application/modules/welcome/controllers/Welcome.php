<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Frontend_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->_init();
	}

	private function _init()
	{
		// $this->output->set_themes('flatlab');
		// $this->output->set_template('main');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
