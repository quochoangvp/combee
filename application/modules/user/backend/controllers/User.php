<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/user_model', 'common_user');
		$this->load->model('common/user_group_model', 'common_user_group');
		$this->load->js('assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js');
        $this->load->css('assets/bootstrap-datetimepicker/css/datetimepicker.css');
        $this->load->css('assets/bootstrap-fileupload/bootstrap-fileupload.css');
		$this->load->js('js/pages/user.js');
		$this->load->library('pagination');
		$this->per_pager = 7;
	}

	public function all($offset = 0)
	{
		$data['users'] = $this->common_user->get_all_user($this->per_pager, $offset);
		$total_rows = $this->common_user->count_rows();

        $config['base_url'] = admin_url('user/all');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->per_pager;
        $this->pagination->initialize($config);

        $data['offset'] = $offset;
        $data['limit'] = $this->per_pager;
        $data['total_rows'] = $total_rows;
		$this->load->view('list', $data);
	}

	public function create()
	{
        $data['groups'] = $this->common_user_group->get_all();
		$this->load->view('form', $data);
	}

	public function edit($id)
	{
		$id = intval($id);
        $user = $this->common_user->get($id);
        if (!$user) {
            show_404();
        }
        $data['user'] = $user;
        $data['groups'] = $this->common_user_group->get_all();
        $this->load->view('form', $data);
	}

	public function group()
	{
		$data['groups'] = $this->common_user_group->get_all();
		$this->load->view('group', $data);
	}

}

/* End of file User.php */
/* Location: ./application/modules/user/backend/controllers/User.php */