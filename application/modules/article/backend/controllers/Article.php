<?php defined('BASEPATH') or exit('No direct script access allowed');

class Article extends Backend_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->model('common/article_model', 'common_article');
        $this->load->model('common/article_category_model', 'common_article_category');
        $this->load->model('common/article_tag_model', 'common_article_tag');
        $this->load->model('category/common/category_model', 'common_category');
        $this->load->model('tag/common/tag_model', 'common_tag');

        $this->load->js('assets/js/pages/article.js');

        $this->per_pager = 7;
    }

    public function all($offset = 0)
    {
        $data['title'] = 'All article';

        $articles = $this->common_article->get_all_articles(
            'article_id, article_title, publish_date, status',
            [$this->per_pager, $offset]
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

        $total_rows = $this->common_article->count_rows();

        $config['base_url'] = admin_url('article/all');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->per_pager;
        $this->pagination->initialize($config);

        $data['articles'] = $articles;
        $data['offset'] = $offset;
        $data['limit'] = $this->per_pager;
        $data['total_rows'] = $total_rows;
        $this->load->view('list', $data);
    }

    public function create()
    {
        $this->common_article->rules[1]['rules'] .=
        '|is_unique[' . $this->common_article->table . '.'
        . $this->common_article->rules[1]['field'] . ']';
        $data['category_nested'] = $this->common_category->get_category_nested();

        $this->load->view('form', $data);
    }

    public function edit($id)
    {
        $id = intval($id);
        $article = $this->common_article->get($id);
        if (!$article) {
            show_404();
        }

        $tags = $this->common_tag->get_all_tags();
        $categories = $this->common_category->get_all();
        $article_tag = $this->common_article_tag->get_all();
        $article_category = $this->common_article_category->get_all();

        $keyword = '';
        foreach ($article_tag as $atag) {
            if ($atag['article_id'] == $article['article_id']) {
                foreach ($tags as $tag) {
                    if ($atag['tag_id'] == $tag['tag_id']) {
                        $keyword = $keyword . $tag['tag_title'] . ',';
                    }
                }
            }
        }
        $_categories = [];
        foreach ($article_category as $acate) {
            if ($acate['article_id'] == $article['article_id']) {
                foreach ($categories as $category) {
                    if ($acate['category_id'] == $category['category_id']) {
                        $_categories[] = $category['category_id'];
                    }
                }
            }
        }
        $article['keyword'] = trim($keyword, ',');
        $article['category'] = $_categories;

        $data['article'] = $article;
        $data['category_nested'] = $this->common_category->get_category_nested();
        $this->load->view('form', $data);
    }

}

/* End of file Article.php */
/* Location: ./application/modules/article/controllers/Article.php */
