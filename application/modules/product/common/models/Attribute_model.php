<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute_model extends Base_model {

	public $table = 'product_attribute';
    public $primary_key = 'attr_id';
    public $rules = array(
        array(
            'field' => 'attr_name',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[2]|max_length[100]',
        ),
        array(
            'field' => 'group_id',
            'label' => 'Group',
            'rules' => 'trim|required|integer',
        ),
    );

    public function __construct() {
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
		$this->load->model('common/attribute_group_model', 'common_attribute_group');
        parent::__construct();
    }

	public function get_attribute_nested()
	{
		$groups = $this->common_attribute_group->get_all();
		$attributes = $this->get_all();
		$group_count = count($groups);
		for ($index=0; $index < $group_count; $index++) {
			foreach ($attributes as $attr) {
				if ($attr['group_id'] == $groups[$index]['group_id']) {
					$groups[$index]['children'][] = $attr;
				}
			}
		}
		return $groups;
	}

}

/* End of file Attribute_model.php */
/* Location: ./application/modules/product/common/models/Attribute_model.php */