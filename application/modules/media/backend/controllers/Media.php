<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/media_model', 'common_media');
		$this->load->library('pagination');
		$this->load->js('js/pages/media.js');

		$this->per_pager = 7;
	}

	public function all($offset = 0)
	{
		$data['all_media'] = $this->common_media->get_all_media($this->per_pager, $offset);
		$total_rows = $this->common_media->count_rows();

        $config['base_url'] = admin_url('media/all');
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
		$this->load->view('form');
	}

}

/* End of file Media.php */
/* Location: ./application/modules/media/backend/controllers/Media.php */