<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Matpel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('auth');
        }
        $this->load->model('Model_matpel');
    }


    public function index()
    {
        $data = [
            'title' => 'Data Mata Pelajaran',
            'content'   => 'matpel/v_matpel',
            'matpel'    => $this->Model_matpel->getAll()->result_array(),
            'user'  => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view('layout/template', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('kode_matpel', 'Kode Mata Pelajaran', 'trim|required|min_length[5]|max_length[5]|is_unique[tb_matpel.kode_matpel]');
        $this->form_validation->set_rules('matpel', 'Mata Pelajaran', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Tambah Data Mata Pelajaran',
                'content'   => 'matpel/v_addmatpel',
                'user'  => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array()
            ];

            $this->load->view('layout/template', $data);
        } else {
            $this->prosesadd();
        }
    }
    function prosesadd()
    {
        $data = [
            'kode_matpel' => htmlspecialchars($this->input->post('kode_matpel')),
            'nama_matpel' => htmlspecialchars($this->input->post('matpel')),
            'kategori_matpel' => htmlspecialchars($this->input->post('kategori'))
        ];

        $this->Model_matpel->save($data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data Mata Pelajaran berhasil ditambahkan.
            </div>'
        );
        redirect('matpel/add');
    }
    function detail()
    {
        $id = $this->uri->segment(3);

        $data = [
            'title' => 'Detail Data Mata Pelajaran',
            'content'   => 'matpel/v_detailmatpel',
            'matpel'    => $this->Model_matpel->detail($id)->row_array(),
            'user'  => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view('layout/template', $data);
    }

    function prosesupdate()
    {
        $id = $this->uri->segment(3);


        $data = [
            'kode_matpel' => htmlspecialchars($this->input->post('kode_matpel')),
            'nama_matpel' => htmlspecialchars($this->input->post('matpel')),
            'kategori_matpel' => htmlspecialchars($this->input->post('kategori'))
        ];

        $this->Model_matpel->update($id, $data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data Mata Pelajaran berhasil diupdate.
            </div>'
        );
        redirect('matpel/detail/' . $id);
    }

    function delete($id)
    {
        $this->Model_matpel->delete($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data Mata Pelajaran berhasil dihapus.
            </div>'
        );
        redirect('matpel');
    }
}
    
    /* End of file Matpel.php */
