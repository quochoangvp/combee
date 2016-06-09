<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link_model extends Base_model {

	public $table = 'link';
    public $primary_key = 'link_id';
    public $rules = array(
        array(
            'field' => 'link_title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[2]|max_length[255]'
            ),
        array(
            'field' => 'link_url',
            'label' => 'Url',
            'rules' => 'trim|required|min_length[2]|max_length[255]'
            ),
        array(
            'field' => 'is_show',
            'label' => 'Show',
            'rules' => 'trim|alpha|exact_length[1]'
            ),
        array(
        	'field' => 'parent_id',
        	'label' => 'Parent',
        	'rules' => 'required|integer'
        	)
        );

    public function __construct()
    {
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

    public function get_link_nested()
	{
		$db_links = $this->as_array()->order_by(['position' => 'ASC'])->get_all();
		return $this->_link_recursive($db_links);
	}

	public function get_link_by_id($cate_id)
	{
		return $this->as_array()->get($cate_id);
	}

	private function _link_recursive($db_links, $parent_id = 0)
	{
		$categories = [];
		if (is_array($db_links)) {
			foreach ($db_links as $index => $cate) {
				if ($cate['parent_id'] == $parent_id) {
					$children = $this->_link_recursive($db_links, $cate['link_id']);
					if (count($children) > 0) {
						$cate['children'] = $children;
					}
					$categories[] = $cate;
				}
			}
		}
		return $categories;
	}

	public function save_multiple_rows($data, $where = null)
	{
		return $this->db->update_batch($this->table, $data, $this->primary_key);
	}

}

/* End of file Link_model.php */
/* Location: ./application/modules/link/common/models/Link_model.php */