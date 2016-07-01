<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturer extends Backend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common/manufacturer_model', 'common_manufacturer');
        $this->load->js('assets/js/pages/product/manufacturer.js');
    }

    public function index()
    {
        $data['manufacturers'] = $this->common_manufacturer->get_all();
        $this->load->view('manufacturer/list', $data);
    }

    public function create()
    {
        $this->load->view('manufacturer/form');
    }

    public function edit($id = null)
    {
        $id = (int) $id;
        $data['manufacturer'] = $this->common_manufacturer->get($id);
        if (!$data['manufacturer']) {
            show_404();
        }
        $this->load->view('manufacturer/form', $data);
    }

}

/* End of file Manufacturer.php */
/* Location: ./application/modules/product/backend/controllers/Manufacturer.php */