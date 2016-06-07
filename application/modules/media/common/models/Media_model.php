<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model extends Base_model {

	public $table = 'media';
    public $primary_key = 'media_id';
    public $rules = array(
        array(
            'field' => 'media_title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[2]|max_length[100]'
            ),
        array(
            'field' => 'media_thumbnail',
            'label' => 'Thumbnail',
            'rules' => 'trim|min_length[2]|max_length[255]'
            ),
        array(
            'field' => 'media_content',
            'label' => 'Content',
            'rules' => 'trim'
            ),
        array(
        	'field' => 'position',
        	'label' => 'Position',
        	'rules' => 'integer'
        	),
        array(
        	'field' => 'is_show',
        	'label' => 'Show',
        	'rules' => 'trim|alpha|exact_length[1]'
        	),
        array(
        	'field' => 'user_group_ids',
        	'lable' => 'User group can access',
        	'rules' => 'trim|required|strip_tags'
        	)
        );

    public function __construct()
    {
        $this->timestamps = TRUE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

    public function get_all_media($limit, $offset)
    {
    	return $this->limit($limit, $offset)->get_all();
    }

}

/* End of file Media_model.php */
/* Location: ./application/modules/media/common/models/Media_model.php */