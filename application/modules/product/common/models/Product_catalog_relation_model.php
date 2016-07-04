<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_catalog_relation_model extends Base_model {

	public $table = 'product_catalog_relation';
    public $primary_key = 'parealation_id';
    public $rules = array(
        array(
            'field' => 'product_id',
            'label' => 'Product',
            'rules' => 'trim|required|integer',
        ),
        array(
            'field' => 'catalog_id',
            'label' => 'Catalog',
            'rules' => 'trim|required|integer',
        ),
    );

    public function __construct() {
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

}

/* End of file Product_catalog_relation_model.php */
/* Location: ./application/modules/product/common/models/Product_catalog_relation_model.php */