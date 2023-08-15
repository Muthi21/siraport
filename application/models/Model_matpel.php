<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_matpel extends CI_Model
{
    function getAll()
    {
        $this->db->order_by('id_matpel', 'DESC');
        return $this->db->get('tb_matpel');
    }
    function save($data)
    {
        return $this->db->insert('tb_matpel', $data);
    }
    function update($id, $data)
    {
        return $this->db->update('tb_matpel', $data, ['id_matpel' => $id]);
    }
    function delete($id)
    {
        return $this->db->delete('tb_matpel', ['id_matpel' => $id]);
    }
    function detail($id)
    {
        return $this->db->get_where('tb_matpel', ['id_matpel' => $id]);
    }
}
    
    /* End of file Model_matpel.php */
