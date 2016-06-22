<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends Base_model {

	public $table = 'user';
    public $primary_key = 'user_id';
    public $rules = array(
        array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'trim|required|min_length[2]|max_length[60]|valid_email'
            ),
        array(
            'field' => 'user_pass',
            'label' => 'Password',
            'rules' => 'trim'
            ),
        array(
            'field' => 'full_name',
            'label' => 'Full name',
            'rules' => 'trim|strip_tags|min_length[2]|max_length[30]'
            ),
        array(
            'field' => 'avatar',
            'label' => 'Avatar',
            'rules' => 'trim|strip_tags|min_length[2]|max_length[300]'
            ),
        array(
            'field' => 'bio',
            'label' => 'Bio',
            'rules' => 'trim|strip_tags'
            ),
        array(
        	'field' => 'group_id',
        	'label' => 'Group',
        	'rules' => 'integer|required'
        	),
        array(
        	'field' => 'status',
        	'label' => 'Status',
        	'rules' => 'integer|required'
        	)
        );
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
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
        $this->load->model('user/common/user_group_model', 'common_user_group');
    }

    public function get_all_user($limit = 10, $offset = 0)
    {
    	$user_table = $this->table;
    	$group_table = $this->common_user_group->table;
    	$sql = "SELECT {$user_table}.*, {$group_table}.group_name, {$group_table}.permission, {$group_table}.status AS group_status
    			FROM {$user_table}
    			LEFT JOIN {$group_table} ON {$user_table}.group_id = {$group_table}.group_id
    			ORDER BY join_date DESC
    			LIMIT ?,?";
    	return $this->db->query($sql, array($offset, $limit))->result_array();
    }

    public function get_in($user_ids)
    {
        $ids = '(' . join(',', $user_ids) . ')';
        $this->db->where_in($user_ids);
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primary_key} IN {$ids}";
        return $this->db->query($sql)->result_array();
    }

    public function delete_user($id)
    {
        return $this->db->delete($this->table, array('user_id' => $id));
    }

    public function get_user_by_email($email)
    {
        return $this->as_array()->get(['user_email' => $email]);
    }

    public function login($email, $password)
    {
        $user_table = $this->table;
        $group_table = $this->common_user_group->table;
        $sql = "SELECT {$user_table}.*, {$group_table}.group_name, {$group_table}.permission, {$group_table}.status AS group_status
                FROM {$user_table}
                LEFT JOIN {$group_table} ON {$user_table}.group_id = {$group_table}.group_id
                WHERE {$user_table}.user_email =? AND {$user_table}.user_pass =?
                LIMIT 1";
        return $this->db->query($sql, array($email, haspass($password)))->row_array();
    }

}

/* End of file User_model.php */
/* Location: ./application/modules/user/common/models/User_model.php */