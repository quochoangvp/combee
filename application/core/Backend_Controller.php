<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend_Controller extends Base_Controller
{

    public $menus;

    public function __construct()
    {
        parent::__construct();
        $this->load->theme('admin');
        $this->load->layout('main');

        $this->load->model('admin_menu_model');
        $this->menus = $this->admin_menu_model->get_menu_recursive();

        $this->load->section('top_menu');
        $this->load->section('top_nav');
        $this->load->section('sidebar', ['menus' => $this->menus]);

        if (!is_admin()) {
            redirect(site_url('member/login'));
        }
    }

}

/* End of file Backend_Controller.php */
/* Location: ./application/core/Backend_Controller.php */
