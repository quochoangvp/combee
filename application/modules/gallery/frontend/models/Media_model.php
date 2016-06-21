<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Media_model extends Base_model
{

    public $table = 'media';
    public $primary_key = 'media_id';

    public function __construct()
    {
        $this->table = $this->_db_prefix . $this->table;
        $this->db->where(['is_active' => 'y']);
        parent::__construct();
    }

}

/* End of file Media_model.php */
/* Location: ./application/modules/gallery/frontend/models/Media_model.php */
