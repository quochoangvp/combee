<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute_group_model extends Base_model {

	public $table = 'product_attribute_group';
    public $primary_key = 'group_id';
    public $rules = array(
        array(
            'field' => 'group_name',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[2]|max_length[120]',
        ),
    );

    public function __construct() {
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

}

/* End of file Attribute_group_model.php */
/* Location: ./application/modules/product/common/models/Attribute_group_model.php */