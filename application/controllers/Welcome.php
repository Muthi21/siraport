<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{



    public function index()
    {
        $data = [
            'title' => 'Welcome'
        ];
        $this->load->view('v_welcome', $data);
    }
}
    
    /* End of file Welcome.php */
