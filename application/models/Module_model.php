<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_model extends Base_Model {

	public $table = 'module';
	public $primary_key = 'id';

	public function __construct()
	{
		$this->table = $this->_db_prefix . $this->table;
		parent::__construct();
	}

}

/* End of file Module_model.php */
/* Location: ./application/models/Module_model.php */