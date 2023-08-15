<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_kelas extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('id_kelas', 'DESC');
        return $this->db->get('tb_kelas');
    }

    function getJoin()
    {
        $this->db->select('*');
        $this->db->from('tb_kelas');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_kelas.walkes', 'LEFT');
        $this->db->order_by('id_kelas', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    function save($data)
    {
        $this->db->insert('tb_kelas', $data);
    }
    function getJoinDet($id)
    {
        $this->db->select('*');
        $this->db->from('tb_kelas');
        $this->db->join('tb_guru', 'tb_guru.id_guru = tb_kelas.walkes', 'LEFT');
        $this->db->where(['id_kelas' => $id]);
        $query = $this->db->get();
        return $query;
    }

    function update($id, $data)
    {
        $this->db->update('tb_kelas', $data, ['id_kelas' => $id]);
    }

    function delete($id)
    {
        $this->db->delete('tb_kelas', ['id_kelas' => $id]);
    }
    function getJoinSiswa($id)
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'LEFT');
        $this->db->where(['tb_siswa.id_kelas' => $id]);
        $this->db->order_by('id_siswa', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
    
    /* End of file Model_kelas.php */
