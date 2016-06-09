<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/gallery_model', 'common_gallery');
	}

	public function all()
	{
		$this->load->view('list');
	}

}

/* End of file Gallery.php */
/* Location: ./application/modules/gallery/backend/controllers/Gallery.php */