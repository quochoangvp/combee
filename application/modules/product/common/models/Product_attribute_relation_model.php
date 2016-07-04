<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_attribute_relation_model extends Base_model {

	public $table = 'product_attribute_relation';
    public $primary_key = 'parealation_id';
    public $rules = array(
        array(
            'field' => 'product_id',
            'label' => 'Product',
            'rules' => 'trim|required|integer',
        ),
        array(
            'field' => 'attr_id',
            'label' => 'Attribute',
            'rules' => 'trim|required|integer',
        ),
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'trim|decimal',
        ),
        array(
            'field' => 'wholesale_price',
            'label' => 'Wholesale price',
            'rules' => 'trim|decimal',
        ),
        array(
            'field' => 'quantity',
            'label' => 'Quantity',
            'rules' => 'trim|integer',
        ),
        array(
            'field' => 'is_instock',
            'label' => 'Instock',
            'rules' => 'trim|integer',
        ),
    );

    public function __construct() {
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

}

/* End of file Product_attribute_relation_model.php */
/* Location: ./application/modules/product/common/models/Product_attribute_relation_model.php */