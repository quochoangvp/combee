<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_tag_model extends Base_model {

	public $table = 'article_tag';
    public $primary_key = 'atag_id';

    public function __construct()
    {
        $this->timestamps = FALSE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

    public function delete_relationships_by_article($article_id)
    {
		$this->db->where_in('article_id', $article_id);
		return $this->db->delete($this->table);
    }

}

/* End of file Article_tag_model.php */
/* Location: ./application/modules/article/common/models/Article_tag_model.php */