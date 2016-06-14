<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Backend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/gallery_model', 'common_gallery');
		$this->load->js('js/pages/gallery.js');
        $this->load->css('assets/bootstrap-fileupload/bootstrap-fileupload.css');
        $this->load->library('pagination');
        $this->per_pager = 7;
	}

	public function all($offset = 0)
	{
		$data['galleries'] = $this->common_gallery->get_all_galleries($this->per_pager, $offset);

		$total_rows = $this->common_gallery->count_rows();

        $config['base_url'] = admin_url('gallery/all');
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

	public function edit($gallery_id)
	{
		$gallery_id = intval($gallery_id);
		$data['gallery'] = $this->common_gallery->get($gallery_id);
		if (!$data['gallery']) {
			redirect(admin_url('gallery/all'));
		}
		$this->load->view('form', $data);
	}

}

/* End of file Gallery.php */
/* Location: ./application/modules/gallery/backend/controllers/Gallery.php */