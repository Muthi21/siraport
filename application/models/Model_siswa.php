<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
    function getJoin()
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'LEFT');
        $this->db->order_by('id_siswa', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    function getJoinDet($id)
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'LEFT');
        $this->db->where(['id_siswa' => $id]);
        $query = $this->db->get();
        return $query;
    }

    function save($data)
    {
        $this->db->insert('tb_siswa', $data);
    }
    function update($id, $data)
    {
        $this->db->update('tb_siswa', $data, ['id_siswa' => $id]);
    }
    function delete($id)
    {
        $this->db->delete('tb_siswa', ['id_siswa' => $id]);
    }
    function getJoinUser()
    {
        $id = $this->session->userdata('id_user');

        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_users', 'tb_users.id_user = tb_siswa.id_user', 'LEFT');
        $this->db->where(['tb_siswa.id_user' => $id]);
        $query = $this->db->get();
        return $query;
    }
}
    
    /* End of file Model_siswa.php */
