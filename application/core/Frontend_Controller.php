<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_Controller extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->theme('news');
    }

}

/* End of file Frontend_Controller.php */
/* Location: ./application/core/Frontend_Controller.php */
