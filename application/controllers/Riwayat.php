<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
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
        $data = array(
            'title' => 'Riwayat Nilai',
            'content'   => 'riwayat_nilai',
            'kelas' => $this->db->get('tb_kelas'),
        );

        $this->load->view('layout/template', $data);
    }

    public function list_siswa()
    {
        $kelas = $this->input->post('kelas', true);
        $this->db->from('tb_siswa');
        $this->db->where(array('id_kelas' => $kelas));
        $this->db->order_by('nama_siswa', 'ASC');
        $siswa = $this->db->get();
        $data = array(
            'title' => 'Riwayat Nilai',
            'content'   => 'list_siswa',
            'user'  => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array(),
            'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $kelas)),
            'siswa' => $siswa,
        );
        $this->load->view('layout/template', $data);
    }

    public function nilai_per_siswa()
    {
        $id_siswa = $this->input->get('idsiswa', true);
        $siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $id_siswa));
        $kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $siswa->row()->id_kelas));
        $this->db->from('tb_nilai');
        $this->db->join('tb_matpel', 'tb_nilai.kode_matpel = tb_matpel.kode_matpel');
        $this->db->where(array('nis' => $siswa->row()->nis));
        $data_nilai = $this->db->get();
        // $data_nilai = $this->db->get_where('tb_nilai', array('nis' => $siswa->row()->nis));
        $data = array(
            'title' => 'Riwayat Nilai',
            'content'   => 'nilai_per_siswa',
            'user'  => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array(),
            'siswa' => $siswa,
            'kelas' => $kelas,
            'data_nilai' => $data_nilai
        );
        $this->load->view('layout/template', $data);
    }
}
    
    /* End of file Riwayat_nilai.php */
