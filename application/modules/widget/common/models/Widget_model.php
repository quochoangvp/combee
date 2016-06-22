<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget_model extends Base_model {

	public $table = 'widget';
	public $primary_key = 'widget_id';
	public $rules = array(
		array(
			'field' => 'widget_name',
			'label' => 'Name',
			'rules' => 'trim|required|min_length[2]|max_length[100]',
		),
		array(
			'field' => 'widget_title',
			'label' => 'Title',
			'rules' => 'trim|required|min_length[2]|max_length[100]',
		),
		array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'trim|strip_tags',
		),
		array(
			'field' => 'image',
			'label' => 'Image',
			'rules' => 'trim|max_length[255]|strip_tags',
		),
		array(
			'field' => 'user_group_ids',
			'lable' => 'User group can access',
			'rules' => 'trim|required|strip_tags',
		),
		array(
			'field' => 'is_active',
			'lable' => 'Status',
			'rules' => 'alpha|exact_length[1]',
		),
		array(
			'field' => 'position_name',
			'label' => 'Position',
			'rules' => 'trim|required|strip_tags',
		),
		array(
			'field' => 'layout',
			'label' => 'Layout',
			'rules' => 'trim|required|strip_tags',
		),
		array(
			'field' => 'theme',
			'label' => 'Theme',
			'rules' => 'trim|required|strip_tags',
		),
		array(
			'field' => 'is_static_content',
			'label' => 'Static content',
			'rules' => 'alpha|exact_length[1]',
		),
		array(
			'field' => 'type_id',
			'label' => 'Type',
			'rules' => 'required|integer',
		),
		array(
			'field' => 'content',
			'label' => 'Content',
			'rules' => 'trim',
		),
	);

	public function __construct() {
		$this->timestamps = FALSE;
		$this->table = $this->_db_prefix . $this->table;
		parent::__construct();
		$this->load->model('widget/common/widget_type_model');
	}

	public function get_all_widget($limit = null, $offset = null, $where = null) {
		$type_table = $this->widget_type_model->table;
		$widget_table = $this->table;
		$sql = "SELECT {$widget_table}.*, {$type_table}.type_title, {$type_table}.type_name
                FROM {$widget_table}
                LEFT JOIN {$type_table} ON {$widget_table}.type_id = {$type_table}.type_id";
		if ($where) {
			$sql .= " WHERE {$where}";
		}
		$sql .= " ORDER BY {$widget_table}.position";
		if ($limit && $offset) {
			$sql .= ' LIMIT ?, ?';
		}
		return $this->db->query($sql, array($offset, $limit))->result_array();
	}

	public function get_all_widget_frontend() {
		return $this->get_all_widget(null, null, "{$this->table}.is_active = 'y'");
	}

	public function get_details($widget_id) {
		$type_table = $this->widget_type_model->table;
		$widget_table = $this->table;
		$sql = "SELECT {$widget_table}.*, {$type_table}.type_title, {$type_table}.type_name
    			FROM {$widget_table}
    			LEFT JOIN {$type_table} ON {$widget_table}.type_id = {$type_table}.type_id
                WHERE {$this->table}.widget_id = ?
				LIMIT 1
		";
		return $this->db->query($sql, array($widget_id))->row_array();
	}

	public function delete_widget($id) {
		return $this->db->delete($this->table, array($this->primary_key => $id));
	}

}

/* End of file Widget_model.php */
/* Location: ./application/modules/widget/common/models/Widget_model.php */