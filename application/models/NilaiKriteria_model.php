<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NilaiKriteria_model extends CI_Model
{

    public function getSubKriteria()
    {
        $query = "SELECT `data_sub_kriteria`.*, `data_kriteria`.`kriteria`
                    FROM `data_sub_kriteria` JOIN `data_kriteria`
                    ON `data_sub_kriteria`.`kriteria_id` = `data_kriteria`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    // public function getRentangNilai($kriteria_id)
    // {
    //     $this->db->where('kriteria_id', $kriteria_id);
    //     $this->db->order_by('id', 'ASC');
    //     return $this->db->from('data_sub_kriteria')
    //         ->get()
    //         ->result();

    //     // $keyword = $this->input->get('kriteria_id');
    //     // $query = $this->db->select('data_sub_kriteria.*, data_kriteria.kriteria')
    //     //     ->from('data_sub_kriteria')
    //     //     ->join('data_kriteria', 'data_sub_kriteria.kriteria_id = data_kriteria.id')
    //     //     ->where('kriteria_id', $keyword)
    //     //     ->get();
    //     // return $query;
    // }

    public function editdatanilaikriteria($id)
    {
        $data = [
            'kriteria_id' => $this->input->post('kriteria_id'),
            'rentang_nilai' => $this->input->post('rentangnilai'),
            'nilai' => $this->input->post('nilaikriteria')
        ];
        $this->db->where('id', $id);
        return $this->db->update('data_sub_kriteria', $data);
    }

    public function hapusdatanilaikriteria($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_sub_kriteria');
    }
}
