<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_predikat extends CI_Model
{
    function save($data)
    {
        return $this->db->insert('tb_predikat', $data);
    }
    function update($id, $data)
    {
        return $this->db->update('tb_predikat', $data, ['id_predikat' => $id]);
    }
    function delete($id)
    {
        return $this->db->delete('tb_predikat', ['id_predikat' => $id]);
    }

    function get()
    {
        return $this->db->get_where('tb_predikat', ['id_guru' => $this->session->userdata('id_guru')]);
    }
    function detail($id)
    {
        return $this->db->get_where('tb_predikat', ['id_predikat' => $id]);
    }
}

/* End of file Model_predikat.php */
