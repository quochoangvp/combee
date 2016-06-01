<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends Base_model {

	public $table = 'category';
	public $primary_key = 'category_id';
	public $rules = array(
        array(
                'field' => 'category_title',
                'label' => 'Name',
                'rules' => 'trim|required|min_length[2]|max_length[300]'
        ),
        array(
                'field' => 'category_url',
                'label' => 'Url',
                'rules' => 'trim|required|min_length[2]|max_length[300]'
        ),
        array(
                'field' => 'keyword',
                'label' => 'Keyword',
                'rules' => 'trim|strip_tags'
        ),
	);

	public function __construct()
	{
		$this->table = $this->_db_prefix . $this->table;
		parent::__construct();
	}

	public function get_category_nested()
	{
		$db_categories = $this->as_array()->get_all();
		return $this->_category_recursive($db_categories);
	}

	public function get_category_by_id($cate_id)
	{
		return $this->as_array()->get($cate_id);
	}

	private function _category_recursive($db_categories, $parent_id = 0)
	{
		$categories = [];
		if (is_array($db_categories)) {
			foreach ($db_categories as $index => $cate) {
				if ($cate['parent_id'] == $parent_id) {
					$children = $this->_category_recursive($db_categories, $cate['category_id']);
					if (count($children) > 0) {
						$cate['children'] = $children;
					}
					$categories[] = $cate;
				}
			}
		}
		return $categories;
	}

}

/* End of file Category_model.php */
/* Location: ./application/modules/category/common/models/Category_model.php */