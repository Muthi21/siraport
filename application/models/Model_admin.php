<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{
    public function cek_predikat($idguru, $nilai)
    {
        $query = $this->db->query("SELECT * FROM tb_predikat WHERE id_guru = '" . $idguru . "'");
        if ($query->num_rows() == 0) {
            return "Guru belum membuat predikat";
        } else {
            $query = $this->db->query("SELECT * 
			FROM `tb_predikat` 
			WHERE id_guru = '$idguru' AND (`nilai_bawah` < $nilai AND `nilai_atas` >= $nilai)");
            return $query->row()->huruf;
        }
    }
}
    
    /* End of file Model_admin.php */
