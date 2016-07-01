<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends Backend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common/supplier_model', 'common_supplier');
        $this->load->js('assets/js/pages/product/supplier.js');
    }

    public function index()
    {
        $data['suppliers'] = $this->common_supplier->get_all();
        $this->load->view('supplier/list', $data);
    }

    public function create()
    {
        $this->load->view('supplier/form');
    }

    public function edit($id = null)
    {
        $id = (int) $id;
        $data['supplier'] = $this->common_supplier->get($id);
        if (!$data['supplier']) {
            show_404();
        }
        $this->load->view('supplier/form', $data);
    }

}

/* End of file Supplier.php */
/* Location: ./application/modules/product/backend/controllers/Supplier.php */