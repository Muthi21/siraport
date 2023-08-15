<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect(site_url() . 'auth');
        }
        $this->load->model('Model_guru');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Guru',
            'content'   => 'guru/dashboard_guru',
            'list'  => $this->Model_guru->getAll()->result_array(),
        ];

        $this->load->view('layout/template', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('kode_guru', 'Kode Guru', 'trim|required|min_length[6]|max_length[6]|is_unique[tb_guru.kode_guru]');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_guru.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[konfir_password]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Tambah Data Guru',
                'content'   => 'guru/add_guru',
            ];

            $this->load->view('layout/template', $data);
        } else {
            $this->proses_add();
        }
    }
    public function proses_add()
    {
        $data = [
            'nama_guru' => htmlspecialchars($this->input->post('nama_guru')),
            'kode_guru' => htmlspecialchars($this->input->post('kode_guru')),
            'tempat_lahir' => htmlspecialchars(ucwords($this->input->post('tempat_lahir'))),
            'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
            'agama' => htmlspecialchars($this->input->post('agama')),
            'no_tlp' => htmlspecialchars($this->input->post('no_tlp')),
            'alamat' => htmlspecialchars(ucfirst($this->input->post('alamat'))),
            'username'  => htmlspecialchars($this->input->post('username')),
            'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
        $this->Model_guru->save($data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>Data guru berhasil ditambahkan.
            </div>'
        );
        redirect(site_url() . 'guru/add');
    }

    public function detail()
    {
        $id = $this->uri->segment(3);

        $this->form_validation->set_rules('kode_guru', 'Kode Guru', 'trim|required|min_length[6]|max_length[6]');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Detail Data Guru',
                'content'   => 'guru/detail_guru',
                'list'  => $this->Model_guru->detail($id)->row_array(),
            ];

            $this->load->view('layout/template', $data);
        } else {
            $this->proses_updateGuru();
        }
    }

    public function proses_updateGuru()
    {
        $id = $this->uri->segment(3);

        $data = [
            'kode_guru' => htmlspecialchars($this->input->post('kode_guru')),
            'nama_guru' => htmlspecialchars(ucwords($this->input->post('nama_guru'))),
            'tempat_lahir' => htmlspecialchars(ucwords($this->input->post('tempat_lahir'))),
            'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
            'agama' => htmlspecialchars($this->input->post('agama')),
            'no_tlp' => htmlspecialchars($this->input->post('no_tlp')),
            'alamat' => htmlspecialchars(ucfirst($this->input->post('alamat'))),
            'username'  => htmlspecialchars($this->input->post('username')),
        ];
        $this->Model_guru->update($id, $data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>Data guru berhasil diupdate.
            </div>'
        );
        redirect(site_url() . 'guru/detail/' . $id);
    }

    public function proses_updatePassword()
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('password', 'Password', 'min_length[5]|matches[konfir_password]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Detail Data Guru',
                'content'   => 'guru/detail_guru',
                'list'  => $this->Model_guru->detail($id)->row_array(),
            ];
            $this->load->view('layout/template', $data);
        } else {
            $data = [
                'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            $this->Model_guru->update($id, $data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>Password berhasil diupdate.
            </div>'
            );
            redirect(site_url() . 'guru/detail/' . $id);
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        $this->Model_guru->delete($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data guru berhasil dihapus.
            </div>'
        );
        redirect(site_url() . 'guru');
    }
}

/* End of file Guru.php */
