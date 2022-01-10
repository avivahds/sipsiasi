<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
    public function getSubKriteria()
    {
        $query = "SELECT `data_sub_kriteria`.*, `data_kriteria`.`kriteria`
                    FROM `data_sub_kriteria` JOIN `data_kriteria`
                    ON `data_sub_kriteria`.`kriteria_id` = `data_kriteria`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function editdatakriteria($id)
    {
        $data = [
            'kriteria' => htmlspecialchars($this->input->post('kriteria', true)),
            // 'bobot' => htmlspecialchars($this->input->post('bobot', true))
        ];
        $this->db->where('id', $id);
        return $this->db->update('data_kriteria', $data);
    }

    public function hapusdatakriteria($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_kriteria');
    }
}
