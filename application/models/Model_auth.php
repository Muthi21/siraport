<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_auth extends CI_Model
{
    function save($data)
    {
        return $this->db->insert('tb_users', $data);
    }
    function delete($id)
    {
        return $this->db->delete('tb_users', ['id_user' => $id]);
    }
    function detail($id)
    {
        return $this->db->get_where('tb_users', ['id_user' => $id]);
    }
    function update($id, $data)
    {
        return $this->db->update('tb_users', $data, ['id_user' => $id]);
    }
}
    
    /* End of file Model_auth.php */
