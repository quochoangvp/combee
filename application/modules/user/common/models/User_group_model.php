<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_group_model extends Base_model {

	public $table = 'usergroup';
    public $primary_key = 'group_id';
    public $rules = array(
        array(
            'field' => 'group_name',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[2]|max_length[100]'
            ),
        array(
            'field' => 'permission',
            'label' => 'Permission',
            'rules' => 'trim|required'
            ),
        array(
        	'field' => 'status',
        	'label' => 'Status',
        	'rules' => 'integer|required'
        	)
        );

    public function __construct()
    {
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

    public function get_by_id($id)
    {
        return $this->as_array()->get($id);
    }

    public function delete_group($id)
    {
        return $this->db->delete($this->table, array('group_id' => $id));
    }

}

/* End of file User_group_model.php */
/* Location: ./application/modules/user/common/models/User_group_model.php */