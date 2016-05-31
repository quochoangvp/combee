<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_menu_model extends Base_model {

	public $table = 'admin_menu';
	public $primary_key = 'id';

	public function __construct()
	{
		$this->table = $this->_db_prefix . $this->table;
		parent::__construct();
	}

	public function get_menu_recursive()
	{
		$db_menu = parent::as_array()->get_all();
		return $this->_menu_recursive($db_menu);
	}

	/**
	 * Get menu recursive
	 * @param  array   $db_menu   Origin array
	 * @param  array   $result    Result array
	 * @param  integer $parent_id Parent ID
	 * @return array              All menu with parrent ID = $parrent_id
	 */
	private function _menu_recursive($db_menu, $parent_id = 0)
	{
		$menus = [];
		foreach ($db_menu as $index => $menu) {
			if ($menu['parent_id'] == $parent_id) {
				$children = $this->_menu_recursive($db_menu, $menu['amenu_id']);
				if (count($children) > 0) {
					$menu['children'] = $children;
				}
				$menus[] = $menu;
			}
		}
		return $menus;
	}

}

/* End of file Admin_menu_model.php */
/* Location: ./application/models/Admin_menu_model.php */