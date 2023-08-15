<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_guru extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('id_guru', 'DESC');
        return $this->db->get('tb_guru');
    }
    function save($data)
    {
        return $this->db->insert('tb_guru', $data);
    }
    function detail($id)
    {
        return $this->db->get_where('tb_guru', ['id_guru' => $id]);
    }
    function update($id, $data)
    {
        return $this->db->update('tb_guru', $data, ['id_guru' => $id]);
    }
    function delete($id)
    {
        return $this->db->delete('tb_guru', ['id_guru' => $id]);
    }
    function getAllJoin($id)
    {
        $this->db->select('*');
        $this->db->from('tb_guru');
        $this->db->join('tb_users', 'tb_users.id_user = tb_guru.id_user', 'LEFT');
        $this->db->where(['tb_guru.id_user' => $id]);
        $query = $this->db->get();
        return $query;
    }

    function getjoin()
    {
        $id = $this->session->userdata('id_guru');

        $this->db->select('*');
        $this->db->from('tb_guru');
        $this->db->join('tb_users', 'tb_users.id_user = tb_guru.id_user', 'LEFT');
        $this->db->where(['tb_guru.id_user' => $id]);
        // $this->db->order_by('tb_guru.id_guru', 'desc');
        $query = $this->db->get();
        return $query;
    }
}

/* End of file Model_guru.php */
