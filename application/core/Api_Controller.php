<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_Controller extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="help-block">', '</p>');
    }

}

/* End of file Api_Controller.php */
/* Location: ./application/core/Api_Controller.php */
