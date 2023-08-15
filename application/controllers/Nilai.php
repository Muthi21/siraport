<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('auth');
        }
        $this->load->model('Model_kelas');
        $this->load->model('Model_matpel');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Nilai',
            'content'   => 'dashboard_nilai',
            'kelas' => $this->Model_kelas->getAll()->result_array(),
            'matpel' => $this->Model_matpel->getAll()->result_array()
        ];
        $this->load->view('layout/template', $data);
    }

    public function siswa_kelas()
    {
        $kelas = $this->input->post('kelas', true);
        $mapel = $this->input->post('matpel', true);
        $tahunajaran = $this->input->post('ta', true);
        $semester = $this->input->post('semester', true);
        $this->db->from('tb_siswa');
        $this->db->where(array('id_kelas' => $kelas));
        $this->db->order_by('nama_siswa', 'ASC');
        $siswa = $this->db->get();

        $data = [
            'title' => 'Data Seluruh Siswa',
            'content'   => 'nilai_siswa_kelas',
            'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $kelas)),
            'siswa' => $siswa,
            'mapel' => $this->db->get_where('tb_matpel', array('id_matpel' => $mapel)),
            'semester' => $semester,
            'tahunajaran' => $tahunajaran,
        ];
        $this->load->view('layout/template', $data);
    }

    public function isi_nilai_siswa()
    {
        $siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $this->input->get('id_siswa', true)));
        $kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $this->input->get('id_kelas', true)));
        $mapel = $this->db->get_where('tb_matpel', array('id_matpel' => $this->input->get('idmapel', true)));
        $cek_nilai = $this->db->get_where('tb_nilai', array('nis' => $siswa->row()->nis, 'kode_matpel' => $mapel->row()->kode_matpel, 'tahun_ajaran' => $this->input->get('ta', true), 'semester' => $this->input->get('semester', true)));
        $data = array(
            'title' => 'Input Nilai',
            'content'   => 'isi_nilai_siswa',
            'siswa' => $siswa,
            'kelas' => $kelas,
            'mapel' => $mapel,
            'guru' => $this->db->get('tb_guru'),
            'cek_nilai' => $cek_nilai,
        );
        $this->load->view('layout/template', $data);
    }

    public function simpan_nilai()
    {

        $data = array(
            'sk7' => $this->input->post('sk7', true),
            'sk8' => $this->input->post('sk8', true),
            'sk9' => $this->input->post('sk9', true),
            'sk10' => $this->input->post('sk10', true),
            'uts' => $this->input->post('uts', true),
            'us' => $this->input->post('uas', true),
            'kkm' => $this->input->post('kkm', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'tahun_ajaran' => $this->input->post('ta', true),
            'semester' => $this->input->post('semester', true),
            'nis' => $this->input->post('nis', true),
            'kode_matpel' => $this->input->post('kodemapel', true),
            'kode_guru' => $this->input->post('guru', true),
        );
        $simpan = $this->db->insert('tb_nilai', $data);
        if ($simpan) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil disimpan !</div>'
            );
            redirect(base_url() . 'nilai/isi_nilai_siswa?id_siswa=' . $this->input->post('id_siswa', true) . '&id_kelas=' . $this->input->post('id_kelas', true) . '&idmapel=' . $this->input->post('idmapel', true) . '&ta=' . $this->input->post('ta', true) . '&semester=' . $this->input->post('semester', true));
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data gagal disimpan !</div>'
            );
            redirect(base_url() . 'nilai/isi_nilai_siswa?id_siswa=' . $this->input->post('id_siswa', true) . '&id_kelas=' . $this->input->post('id_kelas', true) . '&idmapel=' . $this->input->post('idmapel', true) . '&ta=' . $this->input->post('ta', true) . '&semester=' . $this->input->post('semester', true));
        }
    }

    public function lihat_nilai_siswa()
    {
        $siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $this->input->get('id_siswa', true)));
        $kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $this->input->get('id_kelas', true)));
        $mapel = $this->db->get_where('tb_matpel', array('id_matpel' => $this->input->get('idmapel', true)));
        $cek_nilai = $this->db->get_where('tb_nilai', array('nis' => $siswa->row()->nis, 'kode_matpel' => $mapel->row()->kode_matpel, 'tahun_ajaran' => $this->input->get('ta', true), 'semester' => $this->input->get('semester', true)));
        $data = array(
            'title' => 'Detail Nilai',
            'content'   => 'lihat_nilai_siswa',
            'siswa' => $siswa,
            'kelas' => $kelas,
            'mapel' => $mapel,
            'guru' => $this->db->get('tb_guru'),
            'cek_nilai' => $cek_nilai

        );
        $this->load->view('layout/template', $data);
    }

    public function update_nilai()
    {
        $data = array(
            'sk7' => $this->input->post('sk7', true),
            'sk8' => $this->input->post('sk8', true),
            'sk9' => $this->input->post('sk9', true),
            'sk10' => $this->input->post('sk10', true),
            'uts' => $this->input->post('uts', true),
            'us' => $this->input->post('uas', true),
            'kkm' => $this->input->post('kkm', true),
            'deskripsi' => $this->input->post('deskripsi', true),
        );
        $this->db->where('nis', $this->input->post('nis', true));
        $this->db->where('kode_matpel', $this->input->post('kodemapel', true));
        $this->db->where('tahun_ajaran', $this->input->post('ta', true));
        $this->db->where('semester', $this->input->post('semester', true));
        $simpan = $this->db->update('tb_nilai', $data);
        if ($simpan) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data berhasil diupdate !</div>'
            );
            redirect(base_url() . 'nilai/lihat_nilai_siswa?id_siswa=' . $this->input->post('id_siswa', true) . '&id_kelas=' . $this->input->post('id_kelas', true) . '&idmapel=' . $this->input->post('idmapel', true) . '&ta=' . $this->input->post('ta', true) . '&semester=' . $this->input->post('semester', true));
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a><strong>Success!</strong> Data gagal disimpan !</div>'
            );
            redirect(base_url() . 'nilai/lihat_nilai_siswa?id_siswa=' . $this->input->post('id_siswa', true) . '&id_kelas=' . $this->input->post('id_kelas', true) . '&idmapel=' . $this->input->post('idmapel', true) . '&ta=' . $this->input->post('ta', true) . '&semester=' . $this->input->post('semester', true));
        }
    }
}
    
    /* End of file Nilai.php */
