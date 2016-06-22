<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends Base_model {

	public $table = 'article';
    public $primary_key = 'article_id';

    public function __construct()
    {
        $this->timestamps = TRUE;
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

	public function get_in_categories($category_ids = [])
	{
		$cate_ids = join(',', $category_ids);
		$this->load->model('article/common/article_category_model', 'common_article_category');
		$sql = "SELECT * FROM `main_article`
			LEFT JOIN `main_article_category` ON `main_article`.`article_id` = `main_article_category`.`article_id`
			WHERE `main_article_category`.`category_id` IN ($cate_ids)";
		return $this->db->query($sql)->result_array();
	}

}

/* End of file Article_model.php */
/* Location: ./application/modules/article/frontend/models/Article_model.php */