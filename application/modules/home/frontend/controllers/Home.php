<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Frontend_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $layout = $this->load->layout('home');
        $this->output->set_layout($layout);

        $this->load->section('slideshow');

        $this->load->view('home');
    }

}

/* End of file Home.php */
/* Location: ./application/modules/home/controllers/Home.php */