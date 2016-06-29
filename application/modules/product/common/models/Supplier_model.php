<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends Base_model {

    public $table = 'product_supplier';
    public $primary_key = 'supplier_id';
    public $rules = array(
        array(
            'field' => 'supplier_name',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[2]|max_length[255]',
        ),
        array(
            'field' => 'supplier_address',
            'label' => 'Address',
            'rules' => 'trim|max_length[500]',
        ),
        array(
            'field' => 'supplier_email',
            'label' => 'Email',
            'rules' => 'trim|valid_email|max_length[60]',
        ),
        array(
            'field' => 'supplier_phone',
            'label' => 'Phone number',
            'rules' => 'trim|number|max_length[20]',
        ),
        array(
            'field' => 'supplier_logo',
            'label' => 'Logo',
            'rules' => 'trim|max_length[255]',
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim',
        ),
    );

    public function __construct() {
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

}

/* End of file Supplier_model.php */
/* Location: ./application/modules/product/common/models/Supplier_model.php */