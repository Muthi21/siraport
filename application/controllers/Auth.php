<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_auth');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() ==  FALSE) {
            $data   = ['title' => 'Login'];
            $this->load->view('auth/login', $data);
        } else {
            $this->_proseslogin();
        }
    }

    private function _proseslogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        if ($level == 'Admin') {
            $query = $this->db->get_where('tb_users', ['username' => $username])->row_array();

            if ($query) {
                if (password_verify($password, $query['password'])) {

                    $data = [
                        'username' => $query['username'],
                        'id_user' => $query['id_user'],
                        'level' => $query['hak_akses'],
                        'status'    => 'login'
                    ];

                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert  alert-danger alert-dismissible fade show" role="alert">Password anda salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert  alert-danger alert-dismissible fade show" role="alert">Username belum terdaftar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('auth');
            }
        }
        if ($level == 'Guru') {
            $query = $this->db->get_where('tb_guru', ['username' => $username])->row_array();

            if ($query) {
                if (password_verify($password, $query['password'])) {

                    $data = [
                        'username' => $query['username'],
                        'id_guru' => $query['id_guru'],
                        'nama' => $query['nama_guru'],
                        'level' => 'Guru',
                        'status'    => 'login'
                    ];

                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert  alert-danger alert-dismissible fade show" role="alert">Password anda salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert  alert-danger alert-dismissible fade show" role="alert">Username belum terdaftar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('auth');
            }
        }
        if ($level == 'Siswa') {
            $query = $this->db->get_where('tb_siswa', ['username' => $username])->row_array();

            if ($query) {
                if (password_verify($password, $query['password'])) {

                    $data = [
                        'username' => $query['username'],
                        'id_siswa' => $query['id_siswa'],
                        'level' => 'Siswa',
                        'status'    => 'login'
                    ];

                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert  alert-danger alert-dismissible fade show" role="alert">Password anda salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert  alert-danger alert-dismissible fade show" role="alert">Username belum terdaftar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('hak_akses');
        $this->session->sess_destroy();
        redirect('auth');
    }


    public function register()
    {
        if ($this->session->userdata('status') !== 'login') {
            redirect('auth');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[konfir_password]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Data Akun',
                'content'   => 'auth/v_regis',
                'akun'  => $this->db->get('tb_users')->result_array(),
                'user'  => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array()
            ];

            $this->load->view('layout/template', $data);
        } else {
            $this->prosesregister();
        }
    }
    public function prosesregister()
    {
        $data = [
            'username'  => htmlspecialchars($this->input->post('username')),
            'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'hak_akses' => $this->input->post('hak_akses')
        ];
        $this->Model_auth->save($data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Akun berhasil didaftarkan.
            </div>'
        );
        redirect('auth/register');
    }

    public function delete($id)
    {

        $this->Model_auth->delete($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Akun berhasil dihapus.
            </div>'
        );
        redirect('auth/register');
    }
    public function detail($id)
    {
        $id = $this->uri->segment(3);

        $data = [
            'title' => 'Detail Akun',
            'content'   => 'auth/v_detail',
            'akun'  => $this->Model_auth->detail($id)->row_array(),
            'user'  => $this->db->get_where('tb_users', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view('layout/template', $data);
    }
    public function prosesupdate()
    {
        $id = $this->uri->segment(3);

        $data = [
            'username'  => htmlspecialchars($this->input->post('username')),
            'hak_akses' => $this->input->post('hak_akses')
        ];

        $this->Model_auth->update($id, $data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Username berhasil diupdate.
            </div>'
        );
        redirect('auth/detail/' . $id);
    }

    public function prosesupdatepass($id)
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[konfir_password]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Detail Akun',
                'content'   => 'auth/v_detail',
                'user'  => $this->Model_auth->detail($id)->row_array()
            ];

            $this->load->view('layout/template', $data);
        } else {
            $data = [
                'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->Model_auth->update($id, $data);
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
            redirect('auth/register');
        }
    }
}
    
    /* End of file Auth.php */
