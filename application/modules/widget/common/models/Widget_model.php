<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget_model extends Base_model {

	public $table = 'widget';
    public $primary_key = 'widget_id';
    public $rules = array(
        array(
            'field' => 'widget_title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[2]|max_length[100]'
            ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|strip_tags'
            ),
        array(
            'field' => 'data_url',
            'label' => 'Data url',
            'rules' => 'trim|min_length[2]|max_length[255]'
            ),
        array(
        	'field' => 'user_group_ids',
        	'lable' => 'User group can access',
        	'rules' => 'trim|required|strip_tags'
        	),
        array(
        	'field' => 'is_active',
        	'lable' => 'Status',
        	'rules' => 'alpha|required|exact_length[1]'
        	),
       	array(
       		'field' => 'position_name',
       		'label' => 'Position',
       		'rules' => 'trim|required|strip_tags'
       		),
       	array(
       		'field' => 'layout',
       		'label' => 'Layout',
       		'rules' => 'trim|required|strip_tags'
       		),
       	array(
       		'field' => 'theme',
       		'label' => 'Theme',
       		'rules' => 'trim|required|strip_tags'
       		),
        array(
            'field' => 'type_id',
            'label' => 'Type',
            'rules' => 'required|integer'
            ),
      );

    public function __construct()
    {
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
        $this->load->model('common/widget_type_model');
    }

    public function get_all_widget($limit, $offset)
    {
    	$type_table = $this->widget_type_model->table;
    	$widget_table = $this->table;
    	$sql = "SELECT {$widget_table}.widget_id, {$widget_table}.position_name, {$widget_table}.layout, {$widget_table}.position_name, {$widget_table}.theme, {$widget_table}.is_active, {$widget_table}.widget_title, {$type_table}.type_title
    			FROM {$widget_table}
    			LEFT JOIN {$type_table} ON {$widget_table}.type_id = {$type_table}.type_id
				ORDER BY {$widget_table}.position
				LIMIT ?, ?
		";
		return $this->db->query($sql, array($offset, $limit))->result_array();
    }

}

/* End of file Widget_model.php */
/* Location: ./application/modules/widget/common/models/Widget_model.php */