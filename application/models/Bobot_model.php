<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bobot_model extends CI_Model
{

    public function editbobot($id)
    {
        $data = [
            'kriteria' => htmlspecialchars($this->input->post('kriteria', true)),
            'bobot' => htmlspecialchars($this->input->post('bobot', true))
        ];
        $this->db->where('id', $id);
        return $this->db->update('data_kriteria', $data);
    }
}
