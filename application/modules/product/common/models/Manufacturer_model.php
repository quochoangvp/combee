<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturer_model extends Base_model {

    public $table = 'product_manufacturer';
    public $primary_key = 'manufacturer_id';
    public $rules = array(
        array(
            'field' => 'manufacturer_name',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[2]|max_length[255]',
        ),
        array(
            'field' => 'manufacturer_logo',
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

/* End of file Manufacturer_model.php */
/* Location: ./application/modules/product/common/models/Manufacturer_model.php */