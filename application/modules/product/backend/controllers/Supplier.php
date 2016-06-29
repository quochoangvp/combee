<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends Backend_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common/supplier_model', 'common_supplier');
    }

    public function index()
    {
        $data['suppliers'] = $this->common_supplier->get_all();
        $this->load->view('supplier/list', $data);
    }

}

/* End of file Supplier.php */
/* Location: ./application/modules/product/backend/controllers/Supplier.php */