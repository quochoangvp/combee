<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Media_model extends Base_model
{

    public $table = 'media';
    public $primary_key = 'media_id';
    public $rules = array(
        array(
            'field' => 'media_title',
            'label' => 'Title',
            'rules' => 'trim|required|min_length[2]|max_length[255]',
        ),
        array(
            'field' => 'media_url',
            'label' => 'Url',
            'rules' => 'trim|min_length[2]|max_length[255]',
        ),
        array(
            'field' => 'media_link',
            'label' => 'Link',
            'rules' => 'trim|min_length[2]|max_length[255]',
        ),
        array(
            'field' => 'thumbnail',
            'label' => 'Thumbnail',
            'rules' => 'trim|strip_tags|max_length[255]',
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim',
        ),
        array(
            'field' => 'position',
            'lable' => 'Position',
            'rules' => 'trim|integer',
        ),
        array(
            'field' => 'is_active',
            'lable' => 'Status',
            'rules' => 'alpha|exact_length[1]',
        ),
        array(
            'field' => 'gallery_id',
            'lable' => 'Gallery',
            'rules' => 'trim|integer',
        ),
        array(
            'field' => 'widget_id',
            'lable' => 'Widget',
            'rules' => 'trim|integer',
        ),
        array(
            'field' => 'media_config',
            'lable' => 'Configuration',
            'rules' => 'trim',
        ),
    );

    public function __construct()
    {
        $this->table = $this->_db_prefix . $this->table;
        parent::__construct();
    }

    public function get_all_media($gallery_id, $limit = null, $offset = null)
    {
        $query = $this->where(['gallery_id' => $gallery_id]);
        if ($limit) {
            $query = $query->limit($limit, $offset);
        }
        return $query->get_all();
    }

    public function get_all_media_by_widget($widget_id, $limit = null, $offset = null)
    {
        $query = $this->where(['widget_id' => $widget_id]);
        if ($limit) {
            $query = $query->limit($limit, $offset);
        }
        return $query->get_all();
    }

}

/* End of file Media_model.php */
/* Location: ./application/modules/gallery/common/models/Media_model.php */
