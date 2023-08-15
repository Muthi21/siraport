<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('auth');
        }
    }


    public function raport()
    {
        $siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $this->session->userdata('id_siswa')));

        $this->db->from('tb_nilai');
        $this->db->where(array('nis' => $siswa->row()->nis));
        $this->db->group_by('tahun_ajaran, semester');
        $data = $this->db->get();

        $kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $siswa->row()->id_kelas));

        $data = array(
            'title' => 'Raport Siswa',
            'content' => 'siswa/raport',
            'siswa' => $siswa,
            'data' => $data,
            'kelas' => $kelas
        );

        $this->load->view('layout/template', $data);
    }

    public function cetak_raport_siswa()
    {
        $this->load->model('Model_admin');

        $ta = $this->input->get('ta', true);
        $semester = $this->input->get('semester', true);
        $idsiswa = $this->input->get('idsiswa', true);
        $kelas = $this->input->get('idkelas', true);
        $siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $idsiswa));

        $this->db->from('tb_nilai');
        $this->db->join('tb_matpel', 'tb_matpel.kode_matpel = tb_nilai.kode_matpel', 'left');
        $this->db->where(['tb_matpel.kategori_matpel' => 'pengetahuan', 'tb_nilai.nis' => $siswa->row()->nis, 'tb_nilai.tahun_ajaran' => $ta, 'tb_nilai.semester' => $semester]);
        $nilai_pengetahuan = $this->db->get();

        $this->db->from('tb_nilai');
        $this->db->join('tb_matpel', 'tb_matpel.kode_matpel = tb_nilai.kode_matpel', 'left');
        $this->db->where(['tb_matpel.kategori_matpel' => 'Ketrampilan', 'tb_nilai.nis' => $siswa->row()->nis, 'tb_nilai.tahun_ajaran' => $ta, 'tb_nilai.semester' => $semester]);
        $nilai_ketrampilan = $this->db->get();

        $pengembangan_diri = $this->db->get_where('tb_kepribadian', array('nis' => $siswa->row()->nis, 'thajaran' => $ta, 'semester' => $semester, 'kategori' => 'pengembangan diri'));

        $presensi = $this->db->get_where('tb_presensi', array('nis' => $siswa->row()->nis, 'thajaran' => $ta, 'semester' => $semester));

        $catatan = $this->db->get_where('tb_catatan', array('nis' => $siswa->row()->nis, 'thnajaran' => $ta, 'semester' => $semester));

        $kelas = $this->db->get_where('tb_kelas', array('id_kelas' => $kelas));

        $data = array(
            'kelas' => $kelas,
            'siswa' => $siswa,
            'nilai_normatif' => $nilai_pengetahuan,
            'nilai_adaptif' => $nilai_ketrampilan,
            'ta' => $ta,
            'semester' => $semester,
            'pengembangan_diri' => $pengembangan_diri,
            'presensi' => $presensi,
            'catatan' => $catatan,
            'guru' => $this->db->get_where('tb_guru', array('id_guru' => $kelas->row()->walkes)),
        );
        $this->load->view('cetak_raport_siswa1', $data);
    }
}

/* End of file Siswa_user.php */
