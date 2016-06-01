<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends Base_model {

    public $table = 'article';
    public $primary_key = 'article_id';
    public $rules = array(
        array(
            'field' => 'article_title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[2]|max_length[500]'
            ),
        array(
            'field' => 'article_url',
            'label' => 'Url',
            'rules' => 'trim|required|min_length[2]|max_length[500]'
            ),
        array(
            'field' => 'keyword',
            'label' => 'Keyword',
            'rules' => 'trim|strip_tags'
            ),
        );

    public function __construct()
    {
        $this->timestamps = TRUE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

    public function get_all_articles($select, $limit = [5,0])
    {
        return $this->fields($select)->limit($limit[0], $limit[1])->get_all();
    }

}

/* End of file Article_model.php */
/* Location: ./application/modules/article/backend/models/Article_model.php */