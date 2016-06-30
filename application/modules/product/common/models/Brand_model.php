<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends Base_model {

    public $table = 'product_brand';
    public $primary_key = 'brand_id';
    public $rules = array(
        array(
            'field' => 'brand_name',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[2]|max_length[255]',
        ),
        array(
            'field' => 'brand_logo',
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

/* End of file Brand_model.php */
/* Location: ./application/modules/product/common/models/Brand_model.php */