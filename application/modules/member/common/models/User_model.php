<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends Base_model {

	public $table = 'user';
    public $primary_key = 'user_id';
    public $rules_login = array(
        array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'trim|required|min_length[2]|max_length[60]|valid_email'
            ),
        array(
            'field' => 'user_pass',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[2]|max_length[20]'
            ),
        );

    public function __construct()
    {
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

    public function get_user_by_email($email)
    {
    	return $this->as_array()->get(['user_email' => $email]);
    }

    public function login($email, $password)
    {
    	return $this->as_array()->get(['user_email' => $email, 'user_pass' => haspass($password)]);
    }

    public function get_role($role)
    {
    	switch ($role) {
    		case '20':
    			return 'admin';
    			break;
    		
    		default:
    			return 'normal';
    			break;
    	}
    }

}

/* End of file User_model.php */
/* Location: ./application/modules/member/common/models/User_model.php */