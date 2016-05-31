<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Model extends MY_Model {

	public $_db_prefix = 'main_';

	public function __construct()
	{
		$this->return_as = 'array';
		parent::__construct();
	}

	public function set_db_prefix($prefix)
	{
		$this->_db_prefix = $prefix;
	}

}

/* End of file Base_Model.php */
/* Location: ./application/models/Base_Model.php */