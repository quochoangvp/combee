<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends Backend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common/brand_model', 'common_brand');
        $this->load->js('js/pages/product/brand.js');
        $this->load->css('assets/bootstrap-fileupload/bootstrap-fileupload.css');
    }

    public function index()
    {
        $data['brands'] = $this->common_brand->get_all();
        $this->load->view('brand/list', $data);
    }

    public function create()
    {
        $this->load->view('brand/form');
    }

    public function edit($id = null)
    {
        $id = (int) $id;
        $data['brand'] = $this->common_brand->get($id);
        if (!$data['brand']) {
            show_404();
        }
        $this->load->view('brand/form', $data);
    }

}

/* End of file Brand.php */
/* Location: ./application/modules/product/backend/controllers/Brand.php */