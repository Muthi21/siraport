<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('auth');
        }
        $this->load->model('Model_kelas');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kelas',
            'content'   => 'kelas/v_kelas',
            'join'  => $this->Model_kelas->getJoin()->result_array(),
            'user'  => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view('layout/template', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'trim|required|min_length[5]|max_length[5]|is_unique[tb_kelas.kode_kelas]');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required|is_unique[tb_kelas.kelas]');


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Tambah Data Kelas',
                'content'   => 'kelas/v_addkelas',
                'walkes' => $this->db->get('tb_guru')->result_array(),
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
            'kode_kelas' => htmlspecialchars($this->input->post('kode_kelas')),
            'kelas' => htmlspecialchars($this->input->post('nama_kelas')),
            'walkes' => htmlspecialchars($this->input->post('walkes')),
            'semester' => htmlspecialchars($this->input->post('semester')),
        ];

        $this->Model_kelas->save($data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data kelas berhasil ditambahkan.
            </div>'
        );
        redirect('kelas/add');
    }

    function detail()
    {
        $id = $this->uri->segment(3);

        $data = [
            'title' => 'Detail Data Kelas',
            'content'   => 'kelas/v_detailkelas',
            'walkes' => $this->db->get('tb_guru')->result_array(),
            'join'  => $this->Model_kelas->getJoinDet($id)->row_array(),
            'user'  => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view('layout/template', $data);
    }

    function prosesupdate()
    {
        $id = $this->uri->segment(3);

        $data = [
            'kode_kelas' => htmlspecialchars($this->input->post('kode_kelas')),
            'kelas' => htmlspecialchars($this->input->post('nama_kelas')),
            'walkes' => htmlspecialchars($this->input->post('walkes')),
        ];

        $this->Model_kelas->update($id, $data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data kelas berhasil diupdate.
            </div>'
        );
        redirect('kelas/detail/' . $id);
    }


    function delete($id)
    {
        $this->Model_kelas->delete($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data kelas berhasil dihapus.
            </div>'
        );
        redirect('kelas');
    }

    public function siswa($id)
    {
        $data = [
            'title' => 'Data Siswa',
            'content'   => 'kelas/v_siswa',
            'join'  => $this->Model_kelas->getJoinSiswa($id)->result_array(),
            'user'  => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view('layout/template', $data);
    }
}
    
    /* End of file Kelas.php */
