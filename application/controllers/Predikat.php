<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Predikat extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('auth');
        }
        $this->load->model('Model_predikat');
    }


    public function index()
    {

        $data = [
            'title' => 'Data Predikat',
            'content'   => 'predikat/dashboard_predikat',
            'list'  => $this->Model_predikat->get()->result_array()
        ];
        $this->load->view('layout/template', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('huruf', 'Huruf', 'trim|required');
        $this->form_validation->set_rules('predikat', 'Predikat', 'trim|required');

        if ($this->form_validation->run() ==  FALSE) {
            $data = [
                'title' => 'Tambah Data Predikat',
                'content'   => 'predikat/add_predikat',
            ];
            $this->load->view('layout/template', $data);
        } else {
            $this->proses_add();
        }
    }
    function proses_add()
    {

        $data = [
            'id_guru'   => $this->session->userdata('id_guru'),
            'nilai_atas' => htmlspecialchars($this->input->post('nilai_atas')),
            'nilai_bawah' => htmlspecialchars($this->input->post('nilai_bawah')),
            'huruf' => htmlspecialchars($this->input->post('huruf')),
            'predikat' => htmlspecialchars($this->input->post('predikat'))
        ];

        $this->Model_predikat->save($data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data predikat berhasil ditambahkan.
            </div>'
        );
        redirect(site_url() . 'predikat/add');
    }

    function delete($id)
    {
        $this->Model_predikat->delete($id);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data predikat berhasil dihapus.
            </div>'
        );
        redirect(site_url() . 'predikat');
    }

    function detail($id)
    {
        $data = [
            'title' => 'Detail Data Predikat',
            'content'   => 'predikat/detail_predikat',
            'list'  => $this->Model_predikat->detail($id)->row_array(),
        ];
        $this->load->view('layout/template', $data);
    }

    function proses_update()
    {
        $id = $this->uri->segment(3);

        $data = [
            'id_guru'   => $this->session->userdata('id_guru'),
            'nilai_atas' => htmlspecialchars($this->input->post('nilai_atas')),
            'nilai_bawah' => htmlspecialchars($this->input->post('nilai_bawah')),
            'huruf' => htmlspecialchars($this->input->post('huruf')),
            'predikat' => htmlspecialchars($this->input->post('predikat'))
        ];

        $this->Model_predikat->update($id, $data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
            </button>
            Data predikat berhasil diupdate.
            </div>'
        );
        redirect('predikat/detail/' . $id);
    }
}
    
    /* End of file Predikat.php */
