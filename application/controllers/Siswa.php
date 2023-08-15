<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('auth');
        }
        $this->load->model('Model_siswa');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Siswa',
            'content'   => 'siswa/dashboard_siswa',
            'join'  => $this->Model_siswa->getJoin()->result_array(),
        ];

        $this->load->view('layout/template', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'trim|required|min_length[5]|max_length[10]|is_unique[tb_siswa.nis]');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'min_length[5]|matches[konfir_password]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Data Siswa',
                'content'   => 'siswa/add_siswa',
                'kelas' => $this->db->get('tb_kelas')->result_array(),
            ];
            $this->load->view('layout/template', $data);
        } else {
            $this->proses_addSiswa();
        }
    }

    public function proses_addSiswa()
    {

        $data = [
            'nis' => htmlspecialchars($this->input->post('nis')),
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa')),
            'id_kelas' => htmlspecialchars($this->input->post('kelas')),
            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
            'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
            'agama' => htmlspecialchars($this->input->post('agama')),
            'nama_ayah' => htmlspecialchars($this->input->post('nama_ayah')),
            'pekerjaan_ayah' => htmlspecialchars($this->input->post('pekerjaan_ayah')),
            'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu')),
            'pekerjaan_ibu' => htmlspecialchars($this->input->post('pekerjaan_ibu')),
            'nama_wali' => htmlspecialchars($this->input->post('nama_wali')),
            'pekerjaan_wali' => htmlspecialchars($this->input->post('pekerjaan_wali')),
            'tanggal_masuk' => htmlspecialchars($this->input->post('tanggal_masuk')),
            'asal_sekolah' => htmlspecialchars($this->input->post('asal_sekolah')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'no_tlportu' => htmlspecialchars($this->input->post('no_tlportu')),
            'username'  => htmlspecialchars($this->input->post('username')),
            'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];

        $this->Model_siswa->save($data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data siswa berhasil ditambahkan.
            </div>'
        );
        redirect(site_url() . 'siswa/add');
    }

    public function detail()
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('nis', 'NIS', 'trim|required|min_length[5]|max_length[10]');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');


        if ($this->form_validation->run() ==  FALSE) {
            $data = [
                'title' => 'Detail Data Siswa',
                'content'   => 'siswa/detail_siswa',
                'join'  => $this->Model_siswa->getJoinDet($id)->row_array(),
                'kelas' => $this->db->get('tb_kelas')->result_array(),
            ];
            $this->load->view('layout/template', $data);
        } else {
            $this->proses_updateSiswa();
        }
    }

    public function proses_updateSiswa()
    {
        $id = $this->uri->segment(3);


        $data = [
            'nis' => htmlspecialchars($this->input->post('nis')),
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa')),
            'id_kelas' => htmlspecialchars($this->input->post('kelas')),
            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir')),
            'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir')),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
            'agama' => htmlspecialchars($this->input->post('agama')),
            'nama_ayah' => htmlspecialchars($this->input->post('nama_ayah')),
            'pekerjaan_ayah' => htmlspecialchars($this->input->post('pekerjaan_ayah')),
            'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu')),
            'pekerjaan_ibu' => htmlspecialchars($this->input->post('pekerjaan_ibu')),
            'nama_wali' => htmlspecialchars($this->input->post('nama_wali')),
            'pekerjaan_wali' => htmlspecialchars($this->input->post('pekerjaan_wali')),
            'tanggal_masuk' => htmlspecialchars($this->input->post('tanggal_masuk')),
            'asal_sekolah' => htmlspecialchars($this->input->post('asal_sekolah')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'no_tlportu' => htmlspecialchars($this->input->post('no_tlportu')),
            'username'  => htmlspecialchars($this->input->post('username')),
        ];

        $this->Model_siswa->update($id, $data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data siswa berhasil diupdate.
            </div>'
        );
        redirect(site_url() . 'siswa/detail/' . $id);
    }

    public function proses_updatePassword()
    {
        $id = $this->uri->segment(3);
        $this->form_validation->set_rules('password', 'Password', 'min_length[5]|matches[konfir_password]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'matches[password]');

        if ($this->form_validation->run() ==  FALSE) {
            $data = [
                'title' => 'Detail Data Siswa',
                'content'   => 'siswa/detail_siswa',
                'join'  => $this->Model_siswa->getJoinDet($id)->row_array(),
                'kelas' => $this->db->get('tb_kelas')->result_array(),
            ];
            $this->load->view('layout/template', $data);
        } else {
            $data = [
                'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->Model_siswa->update($id, $data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Password berhasil diupdate.
            </div>'
            );
            redirect(site_url() . 'siswa/detail/' . $id);
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        $this->Model_siswa->delete($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data siswa berhasil dihapus.
            </div>'
        );
        redirect(site_url() . 'siswa');
    }
}
    
    /* End of file Siswa.php */
