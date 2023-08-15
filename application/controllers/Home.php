<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'content'   => 'dashboard',
            'guru' => $this->db->get_where('tb_guru', array('id_guru' => $this->session->userdata('id_guru')))->row_array(),
            'siswa' => $this->db->get_where('tb_siswa', array('id_siswa' => $this->session->userdata('id_siswa')))->row_array()
        ];

        $this->load->view('layout/template', $data);
    }
}

/* End of file Home.php */
