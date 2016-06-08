<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Widget_type_model extends Base_model {

	public $table = 'widgettype';
    public $primary_key = 'type_id';
    public $rules = array(
        array(
            'field' => 'type_name',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[2]|max_length[60]'
            ),
        array(
            'field' => 'type_title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[2]|max_length[125]'
            ),
        array(
            'field' => 'is_active',
            'label' => 'Status',
            'rules' => 'alpha|exact_length[1]'
            ),
        );

    public function __construct()
    {
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

}

/* End of file Widget_type_model.php */
/* Location: ./application/modules/widget/common/models/Widget_type_model.php */