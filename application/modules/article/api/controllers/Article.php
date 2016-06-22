<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Api_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('common/article_model', 'common_article');
		$this->load->model('common/article_tag_model', 'common_article_tag');
		$this->load->model('common/article_category_model', 'common_article_category');
		$this->load->model('tag/common/tag_model', 'common_tag');
	}

	public function create_post()
	{
		$data = $this->post();
		$rules = $this->common_article->rules;

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($rules)) {

			$categories_id_list = $data['category'];
			unset($data['category']);

			$result = $this->common_article->insert(set_data($data));
			if ($result) {

				// Insert article tag relationships
				$tags = $this->common_tag->get_all_tags();
				$atags = [];

				$article_tags = explode(',', $data['keyword']);
				foreach ($tags as $index => $tag) {
					if (in_array($tag['tag_title'], $article_tags)) {
						$_temp['article_id'] = $result;
						$_temp['tag_id'] = $tag['tag_id'];
						$atags[] = $_temp;
					}
				}
				$insert_tags_relationships_result = $this->common_article_tag->insert($atags);

				// Insert article category relationships
				$acate = [];
				foreach ($categories_id_list as $cate) {
					$_temp['article_id'] = $result;
					$_temp['category_id'] = $cate;
					$acate[] = $_temp;
				}
				$insert_cate_relationships_result = $this->common_article_category->insert($acate);

				return $this->response([
					'status' => REST_Controller::HTTP_OK,
					'message' => 'Article created',
					'id' => $result
				], REST_Controller::HTTP_OK);
			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Can\'t not create article'
				], REST_Controller::HTTP_BAD_REQUEST);
			}

		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_BAD_REQUEST,
				'message' => 'Please fill all the fields is required',
				'errors' => form_errors($rules)
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function update_post()
	{
		$data = $this->post();

		$article = $this->common_article->get(intval($data['article_id']));

		if ($article) {

			$rules = $this->common_article->rules;

			$this->form_validation->set_data($data);
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run($rules)) {

				$categories_id_list = $data['category'];
				unset($data['category']);

				$data = set_data($data);

				if (!isset($data['status'])) {
					$data['status'] = 'draft';
				}
				if (!isset($data['allow_comment'])) {
					$data['allow_comment'] = 'n';
				}
				if (!isset($data['featured'])) {
					$data['featured'] = 'n';
				}
				$result = $this->common_article->update($data, $article['article_id']);
				if ($result) {

					// Insert article tag relationships
					$tags = $this->common_tag->get_all_tags();
					$atags = [];

					$article_tags = explode(',', $data['keyword']);
					foreach ($tags as $index => $tag) {
						if (in_array($tag['tag_title'], $article_tags)) {
							$_temp['article_id'] = $result;
							$_temp['tag_id'] = $tag['tag_id'];
							$atags[] = $_temp;
						}
					}
					$delete_tags_relationships_result = $this->common_article_tag->delete_relationships_by_article($article['article_id']);
					if ($atags) {
						$insert_tags_relationships_result = $this->common_article_tag->insert($atags);
					}

					// Insert article category relationships
					$acate = [];
					foreach ($categories_id_list as $cate) {
						$_temp['article_id'] = $article['article_id'];
						$_temp['category_id'] = $cate;
						$acate[] = $_temp;
					}
					$delete_cate_relationships_result = $this->common_article_category->delete_relationships_by_article($article['article_id']);
					if ($acate) {
						$insert_cate_relationships_result = $this->common_article_category->insert($acate);
					}

					return $this->response([
						'status' => REST_Controller::HTTP_OK,
						'message' => 'Article created',
						'id' => $result
					], REST_Controller::HTTP_OK);
				} else {
					return $this->response([
						'status' => REST_Controller::HTTP_BAD_REQUEST,
						'message' => 'Can\'t not create article'
					], REST_Controller::HTTP_BAD_REQUEST);
				}

			} else {
				return $this->response([
					'status' => REST_Controller::HTTP_BAD_REQUEST,
					'message' => 'Please fill all the fields is required',
					'errors' => form_errors($rules)
				], REST_Controller::HTTP_BAD_REQUEST);
			}
		} else {
			return $this->response([
				'status' => REST_Controller::HTTP_NOT_FOUND,
				'message' => 'Article is not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

}

/* End of file Article.php */
/* Location: ./application/modules/article/api/controllers/Article.php */