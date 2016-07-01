<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends Backend_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common/gallery_model', 'common_gallery');
        $this->load->js('assets/js/pages/gallery.js');
        $this->load->library('pagination');
        $this->per_pager = 7;
    }

    public function all($offset = 0)
    {
        $data['galleries'] = $this->common_gallery->get_all_galleries($this->per_pager, $offset);

        $total_rows = $this->common_gallery->count_rows();

        $config['base_url'] = admin_url('gallery/all');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->per_pager;
        $this->pagination->initialize($config);

        $data['offset'] = $offset;
        $data['limit'] = $this->per_pager;
        $data['total_rows'] = $total_rows;
        $this->load->view('list', $data);
    }

    public function create()
    {
        $this->load->view('form');
    }

    public function edit($gallery_id)
    {
        $gallery_id = intval($gallery_id);
        $data['gallery'] = $this->common_gallery->get($gallery_id);
        if (!$data['gallery']) {
            redirect(admin_url('gallery/all'));
        }
        $this->load->view('form', $data);
    }

    public function media($page = null, $gallery_id = null, $media_id = null)
    {
        $this->load->model('common/media_model', 'common_media');
        $gallery_id = intval($gallery_id);
        $media_id = intval($media_id);
        $gallery = $this->common_gallery->get($gallery_id);
        switch ($page) {
            case 'list':
                $offset = $media_id;
                $this->_media_list($gallery, $offset);
                break;
            case 'edit':
                $this->_media_edit($gallery, $media_id);
                break;
            case 'create':
                $this->_media_create($gallery);
                break;
            default:
                show_404();
                break;
        }
    }

    private function _media_list($gallery, $offset)
    {
        $this->load->css('assets/fancybox/source/jquery.fancybox.css');
        $this->load->css('assets/css/gallery.css');
        $this->load->js('assets/fancybox/source/jquery.fancybox.js');

        $per_pager = 6;
        $data['media_list'] = $this->common_media->get_all_media($gallery['gallery_id'], $per_pager, $offset);
        $total_rows = $this->common_media->count_rows(['gallery_id' => $gallery['gallery_id']]);

        $config['base_url'] = admin_url('gallery/media/list/' . $gallery['gallery_id']);
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_pager;
        $this->pagination->initialize($config);

        $data['offset'] = $offset;
        $data['limit'] = $per_pager;
        $data['total_rows'] = $total_rows;
        $data['gallery'] = $gallery;
        $this->load->view('media/list', $data);
    }

    private function _media_create($gallery)
    {
        $data['gallery'] = $gallery;
        $this->load->view('media/form', $data);
    }

    private function _media_edit($gallery, $media_id)
    {
        $data['gallery'] = $gallery;
        $data['media'] = $this->common_media->get($media_id);
        $this->load->view('media/form', $data);
    }

}

/* End of file Gallery.php */
/* Location: ./application/modules/gallery/backend/controllers/Gallery.php */
