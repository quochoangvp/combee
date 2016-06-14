<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends Base_model {

	public $table = 'gallery';
    public $primary_key = 'gallery_id';
    public $rules = array(
        array(
            'field' => 'gallery_title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[2]|max_length[255]'
            ),
        array(
            'field' => 'thumbnail',
            'label' => 'Thumbnail',
            'rules' => 'trim|strip_tags|max_length[255]'
            ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|strip_tags'
            ),
        array(
        	'field' => 'type',
        	'lable' => 'Type',
        	'rules' => 'trim|required|alpha'
        	),
        array(
        	'field' => 'is_active',
        	'lable' => 'Status',
        	'rules' => 'alpha|exact_length[1]'
        	),
      );

    public function __construct()
    {
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

    public function get_all_galleries($limit, $offset)
    {
    	return $this->limit($limit, $offset)->get_all();
    }

}

/* End of file Gallery_model.php */
/* Location: ./application/modules/gallery/common/models/Gallery_model.php */