<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_tag_model extends Base_model {

	public $table = 'product_tag';
	public $primary_key = 'tag_id';
	public $rules = array(
		array(
			'field' => 'tag_title',
			'label' => 'Title',
			'rules' => 'trim|required|min_length[2]|max_length[500]',
		),
		array(
			'field' => 'tag_url',
			'label' => 'Url',
			'rules' => 'trim|required|min_length[2]|max_length[500]',
		),
		array(
			'field' => 'is_show',
			'label' => 'Url',
			'rules' => 'trim|exact_length[1]',
		),
	);

	public function __construct() {
		$this->timestamps = FALSE;
		$this->table = $this->_db_prefix . $this->table;
		parent::__construct();
	}

	public function get_all_tags() {
		return $this->as_array()->get_all();
	}

	public function get_by_id($id) {
		return $this->as_array()->get($id);
	}

	public function get_tags_by_keyword($keyword) {
		return $this->where('tag_title', 'LIKE', $keyword)->as_array()->get_all();
	}

}

/* End of file Product_tag_model.php */
/* Location: ./application/modules/product/common/models/Product_tag_model.php */