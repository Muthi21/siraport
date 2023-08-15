<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Raport extends CI_Controller
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
            'title' => 'Isi Raport',
            'content'   => 'dashboard_isi_raport',
            'kelas' => $this->db->get_where('tb_kelas', array('walkes' => $this->session->userdata('id_guru'))),
        );
        $this->load->view('layout/template', $data);
    }

    public function list_siswa_isi_raport()
    {
        $ta = $this->input->post('ta', true);
        $semester = $this->input->post('semester', true);
        $kelas = $this->input->post('kelas', true);
        $this->db->from('tb_siswa');
        $this->db->where(array('id_kelas' => $kelas));
        $this->db->order_by('nama_siswa', 'ASC');
        $siswa = $this->db->get();
        $data = array(
            'title' => 'Isi Raport',
            'content' => 'list_siswa_isi_raport',
            'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $kelas)),
            'siswa' => $siswa,
            'ta' => $ta,
            'semester' => $semester
        );
        $this->load->view('layout/template', $data);
    }

    public function isi_raport_siswa()
    {
        $this->load->model('Model_admin');



        $ta = $this->input->get('ta', true);
        $semester = $this->input->get('semester', true);
        $idsiswa = $this->input->get('idsiswa', true);
        $kelas = $this->input->get('idkelas', true);
        $siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $idsiswa));

        $this->db->from('tb_nilai');
        $this->db->join('tb_matpel', 'tb_matpel.kode_matpel = tb_nilai.kode_matpel', 'left');
        $this->db->where(['tb_matpel.kategori_matpel' => 'Pengetahuan', 'tb_nilai.nis' => $siswa->row()->nis, 'tb_nilai.tahun_ajaran' => $ta, 'tb_nilai.semester' => $semester]);
        $nilai_pengetahuan = $this->db->get();


        $this->db->from('tb_nilai');
        $this->db->join('tb_matpel', 'tb_matpel.kode_matpel = tb_nilai.kode_matpel', 'left');
        $this->db->where(['tb_matpel.kategori_matpel' => 'Ketrampilan', 'tb_nilai.nis' => $siswa->row()->nis, 'tb_nilai.tahun_ajaran' => $ta, 'tb_nilai.semester' => $semester]);
        $nilai_ketrampilan = $this->db->get();

        $pengembangan_diri = $this->db->get_where('tb_kepribadian', array('nis' => $siswa->row()->nis, 'thajaran' => $ta, 'semester' => $semester, 'kategori' => 'pengembangan diri'));

        $presensi = $this->db->get_where('tb_presensi', array('nis' => $siswa->row()->nis, 'thajaran' => $ta, 'semester' => $semester));

        $catatan = $this->db->get_where('tb_catatan', array('nis' => $siswa->row()->nis, 'thnajaran' => $ta, 'semester' => $semester));

        $data = array(
            'title' => 'Isi Raport',
            'content' => 'isi_raport_siswa',
            'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $kelas)),
            'siswa' => $siswa,
            'nilai_pengetahuan' => $nilai_pengetahuan,
            'nilai_ketrampilan' => $nilai_ketrampilan,
            'ta' => $ta,
            'semester' => $semester,
            'pengembangan_diri' => $pengembangan_diri,
            'presensi' => $presensi,
            'catatan' => $catatan
        );
        $this->load->view('layout/template', $data);
    }

    public function simpan_pengembangan_diri()
    {
        $data = array(
            'nis' => $this->input->post('nis', true),
            'thajaran' => $this->input->post('ta', true),
            'semester' => $this->input->post('semester', true),
            'komponen' => $this->input->post('komponen', true),
            'predikat' => $this->input->post('predikat', true),
            'kategori' => 'pengembangan diri',
        );
        $simpan = $this->db->insert('tb_kepribadian', $data);
        if ($simpan) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data berhasil disimpan !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->post('idsiswa', true) . '&idkelas=' . $this->input->post('idkelas', true) . '&ta=' . $this->input->post('ta', true) . '&semester=' . $this->input->post('semester', true) . '&page=cas');
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data gagal disimpan !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->post('id_siswa', true) . '&idkelas=' . $this->input->post('idkelas', true) . '&ta=' . $this->input->post('ta', true) . '&semester=' . $this->input->post('semester', true) . 'page=cas');
        }
    }

    public function hapus_pengembangan_diri()
    {
        $this->db->where(array('id' => $this->input->get('idkepribadian', true)));
        $hapus = $this->db->delete('tb_kepribadian');
        if ($hapus) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data berhasil dihapus !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->get('idsiswa', true) . '&idkelas=' . $this->input->get('idkelas', true) . '&ta=' . $this->input->get('ta', true) . '&semester=' . $this->input->get('semester', true) . '&page=cas');
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data gagal dihapus !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->post('id_siswa', true) . '&idkelas=' . $this->input->get('idkelas', true) . '&ta=' . $this->input->get('ta', true) . '&semester=' . $this->input->get('semester', true) . 'page=cas');
        }
    }

    public function simpan_presensi()
    {
        $data = array(
            'nis' => $this->input->post('nis', true),
            'thajaran' => $this->input->post('ta', true),
            'semester' => $this->input->post('semester', true),
            'jenis' => $this->input->post('jenis', true),
            'jumlah' => $this->input->post('jumlah', true),
        );
        $simpan = $this->db->insert('tb_presensi', $data);
        if ($simpan) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data berhasil disimpan !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->post('idsiswa', true) . '&idkelas=' . $this->input->post('idkelas', true) . '&ta=' . $this->input->post('ta', true) . '&semester=' . $this->input->post('semester', true) . '&page=cas');
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data gagal disimpan !</div>'
            );
            redirect(base_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->post('id_siswa', true) . '&idkelas=' . $this->input->post('idkelas', true) . '&ta=' . $this->input->post('ta', true) . '&semester=' . $this->input->post('semester', true) . 'page=cas');
        }
    }

    public function hapus_presensi()
    {
        $this->db->where(array('id' => $this->input->get('idpresensi', true)));
        $hapus = $this->db->delete('tb_presensi');
        if ($hapus) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data berhasil dihapus !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->get('idsiswa', true) . '&idkelas=' . $this->input->get('idkelas', true) . '&ta=' . $this->input->get('ta', true) . '&semester=' . $this->input->get('semester', true) . '&page=cas');
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data gagal dihapus !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->post('id_siswa', true) . '&idkelas=' . $this->input->get('idkelas', true) . '&ta=' . $this->input->get('ta', true) . '&semester=' . $this->input->get('semester', true) . 'page=cas');
        }
    }

    public function simpan_catatan()
    {
        $data = array(
            'nis' => $this->input->post('nis', true),
            'thnajaran' => $this->input->post('ta', true),
            'semester' => $this->input->post('semester', true),
            'catatan' => $this->input->post('catatan', true),
        );
        $simpan = $this->db->insert('tb_catatan', $data);
        if ($simpan) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data berhasil disimpan !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->post('idsiswa', true) . '&idkelas=' . $this->input->post('idkelas', true) . '&ta=' . $this->input->post('ta', true) . '&semester=' . $this->input->post('semester', true) . '&page=cas');
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data gagal disimpan !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->post('id_siswa', true) . '&idkelas=' . $this->input->post('idkelas', true) . '&ta=' . $this->input->post('ta', true) . '&semester=' . $this->input->post('semester', true) . 'page=cas');
        }
    }

    public function hapus_catatan()
    {
        $this->db->where(array('id' => $this->input->get('idcatatan', true)));
        $hapus = $this->db->delete('tb_catatan');
        if ($hapus) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data berhasil dihapus !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->get('idsiswa', true) . '&idkelas=' . $this->input->get('idkelas', true) . '&ta=' . $this->input->get('ta', true) . '&semester=' . $this->input->get('semester', true) . '&page=cas');
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>Data gagal dihapus !</div>'
            );
            redirect(site_url() . 'raport/isi_raport_siswa?idsiswa=' . $this->input->post('id_siswa', true) . '&idkelas=' . $this->input->get('idkelas', true) . '&ta=' . $this->input->get('ta', true) . '&semester=' . $this->input->get('semester', true) . 'page=cas');
        }
    }

    public function lihat_raport()
    {
        $data = array(
            'title' => 'Lihat Raport',
            'content' => 'lihat_raport',
            'kelas' => $this->db->get_where('tb_kelas', array('walkes' => $this->session->userdata('id_guru'))),
        );
        $this->load->view('layout/template', $data);
    }

    public function list_siswa_lihat_raport()
    {
        $kelas = $this->input->post('kelas', true);
        $this->db->from('tb_siswa');
        $this->db->where(array('id_kelas' => $kelas));
        $this->db->order_by('nama_siswa', 'ASC');
        $siswa = $this->db->get();
        $data = array(
            'title' => 'Isi Raport',
            'content' => 'list_siswa_lihat_raport',
            'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $kelas)),
            'siswa' => $siswa,

        );
        $this->load->view('layout/template', $data);
    }

    public function lihat_raport_siswa()
    {
        $ta = $this->input->get('ta', true);
        $semester = $this->input->get('semester', true);
        $idsiswa = $this->input->get('idsiswa', true);
        $kelas = $this->input->get('idkelas', true);
        $siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $idsiswa));

        $this->db->from('tb_nilai');
        $this->db->where(array('nis' => $siswa->row()->nis));
        $this->db->group_by('tahun_ajaran, semester');
        $data = $this->db->get();

        $data = array(
            'title' => 'Lihat Raport',
            'content' => 'lihat_raport_siswa',
            'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $kelas)),
            'siswa' => $siswa,
            'idsiswa' => $idsiswa,
            'ta' => $ta,
            'semester' => $semester,
            'data' => $data

        );
        $this->load->view('layout/template', $data);
    }

    public function preview_raport_siswa()
    {
        $this->load->model('Model_admin');

        $ta = $this->input->get('ta', true);
        $semester = $this->input->get('semester', true);
        $idsiswa = $this->input->get('idsiswa', true);
        $kelas = $this->input->get('idkelas', true);
        $siswa = $this->db->get_where('tb_siswa', array('id_siswa' => $idsiswa));

        $this->db->from('tb_nilai');
        $this->db->join('tb_matpel', 'tb_matpel.kode_matpel = tb_nilai.kode_matpel', 'left');
        $this->db->where(['tb_matpel.kategori_matpel' => 'Pengetahuan', 'tb_nilai.nis' => $siswa->row()->nis, 'tb_nilai.tahun_ajaran' => $ta, 'tb_nilai.semester' => $semester]);
        $nilai_pengetahuan = $this->db->get();


        $this->db->from('tb_nilai');
        $this->db->join('tb_matpel', 'tb_matpel.kode_matpel = tb_nilai.kode_matpel', 'left');
        $this->db->where(['tb_matpel.kategori_matpel' => 'Ketrampilan', 'tb_nilai.nis' => $siswa->row()->nis, 'tb_nilai.tahun_ajaran' => $ta, 'tb_nilai.semester' => $semester]);
        $nilai_ketrampilan = $this->db->get();

        $pengembangan_diri = $this->db->get_where('tb_kepribadian', array('nis' => $siswa->row()->nis, 'thajaran' => $ta, 'semester' => $semester, 'kategori' => 'pengembangan diri'));

        $presensi = $this->db->get_where('tb_presensi', array('nis' => $siswa->row()->nis, 'thajaran' => $ta, 'semester' => $semester));

        $catatan = $this->db->get_where('tb_catatan', array('nis' => $siswa->row()->nis, 'thnajaran' => $ta, 'semester' => $semester));

        $data = array(
            'title' => 'Lihat Raport',
            'content' => 'preview_raport_siswa',
            'kelas' => $this->db->get_where('tb_kelas', array('id_kelas' => $kelas)),
            'siswa' => $siswa,
            'nilai_pengetahuan' => $nilai_pengetahuan,
            'nilai_ketrampilan' => $nilai_ketrampilan,
            'ta' => $ta,
            'semester' => $semester,
            'pengembangan_diri' => $pengembangan_diri,
            'presensi' => $presensi,
            'catatan' => $catatan
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
        $this->db->where(['tb_matpel.kategori_matpel' => 'Pengetahuan', 'tb_nilai.nis' => $siswa->row()->nis, 'tb_nilai.tahun_ajaran' => $ta, 'tb_nilai.semester' => $semester]);
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
        $this->load->view('cetak_raport_siswa', $data);
    }
}

/* End of file Raport.php */
