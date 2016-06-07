<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_widget extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	private function _init()
	{
		$this->load->model('common/article_model', 'common_article');
		$this->load->model('common/article_category_model', 'common_article_category');
        $this->load->model('common/article_tag_model', 'common_article_tag');
        $this->load->model('category/common/category_model', 'common_category');
        $this->load->model('tag/common/tag_model', 'common_tag');
	}

	public function list($order = 'newest', $limit = 5)
	{
		$this->_init();
		$articles = $this->common_article->get_all_articles(
            'article_id, article_title, publish_date, status',
            [$limit, 0]
        );
        $tags = $this->common_tag->get_all_tags();
        $categories = $this->common_category->get_all();
        $article_tag = $this->common_article_tag->get_all();
        $article_category = $this->common_article_category->get_all();

        $articles_num = count($articles);
        for ($a = 0; $a < $articles_num; $a++) {
            // Find all tags for article $a
            $_tags = '';
            foreach ($article_tag as $atag) {
                if ($atag['article_id'] == $articles[$a]['article_id']) {
                    foreach ($tags as $tag) {
                        if ($atag['tag_id'] == $tag['tag_id']) {
                            $_tags = $_tags . $tag['tag_title'] . ', ';
                        }
                    }
                }
            }
            $_categories = '';
            foreach ($article_category as $acate) {
                if ($acate['article_id'] == $articles[$a]['article_id']) {
                    foreach ($categories as $category) {
                        if ($acate['category_id'] == $category['category_id']) {
                            $_categories = $_categories . $category['category_title'] . ', ';
                        }
                    }
                }
            }
            $articles[$a]['article_tags'] = trim($_tags, ', ');
            $articles[$a]['article_categories'] = trim($_categories, ', ');
            $articles[$a]['author'] = 'Admin';
        }

        $data['articles'] = $articles;
        $this->load->view('list_widget', $data);
	}

}

/* End of file Article_widget.php */
/* Location: ./application/modules/article/frontend/controllers/Article_widget.php */