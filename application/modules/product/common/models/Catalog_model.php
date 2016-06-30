<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog_model extends Base_model {

	public $table = 'product_catalog';
	public $primary_key = 'catalog_id';
	public $rules = array(
        array(
                'field' => 'catalog_name',
                'label' => 'Name',
                'rules' => 'trim|required|min_length[2]|max_length[120]'
        ),
        array(
                'field' => 'catalog_url',
                'label' => 'Url',
                'rules' => 'trim|required|min_length[2]|max_length[120]'
        ),
        array(
                'field' => 'catalog_image',
                'label' => 'Image',
                'rules' => 'trim|required|min_length[2]|max_length[120]'
        ),
        array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim'
        ),
        array(
                'field' => 'sort_order',
                'label' => 'Order',
                'rules' => 'trim|integer'
        ),
        array(
                'field' => 'parent_id',
                'label' => 'Parent',
                'rules' => 'trim|required|integer'
        ),
	);

	public function __construct()
	{
		$this->table = $this->_db_prefix . $this->table;
		parent::__construct();
	}

	public function get_catalog_nested()
	{
		$db_catalogs = $this->as_array()->order_by(['sort_order' => 'ASC'])->get_all();
		return $this->_catalog_recursive($db_catalogs);
	}

	public function get_catalog_by_id($cata_id)
	{
		return $this->as_array()->get($cata_id);
	}

	private function _catalog_recursive($db_catalogs, $parent_id = 0)
	{
		$catalogs = [];
		if (is_array($db_catalogs)) {
			foreach ($db_catalogs as $index => $cata) {
				if ($cata['parent_id'] == $parent_id) {
					$children = $this->_catalog_recursive($db_catalogs, $cata['catalog_id']);
					if (count($children) > 0) {
						$cata['children'] = $children;
					}
					$catalogs[] = $cata;
				}
			}
		}
		return $catalogs;
	}

	public function save_multiple_rows($data, $where = null)
	{
		return $this->db->update_batch($this->table, $data, $this->primary_key);
	}

}

/* End of file Catalog_model.php */
/* Location: ./application/modules/product/common/models/Catalog_model.php */