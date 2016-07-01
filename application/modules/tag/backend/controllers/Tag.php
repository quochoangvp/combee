<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/tag_model', 'common_tag');
		$this->load->js('assets/js/pages/tag.js');
	}

	public function all()
	{
		$data['tags'] = $this->common_tag->get_all_tags();
		$this->load->view('list', $data);
	}

}

/* End of file Tag.php */
/* Location: ./application/modules/tag/backend/controllers/Tag.php */