<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{

    public function detaildatajurusan($id)
    {
        $query = $this->db->select('data_siswa_berprestasi.*, data_jurusan.nama_jurusan, kelas.kelas, tahun_akademik.tahun as tahun')
            ->from('data_siswa_berprestasi')
            ->join('tahun_akademik', 'data_siswa_berprestasi.tahun_id = tahun_akademik.id')
            ->join('data_jurusan', 'data_siswa_berprestasi.jurusan_id = data_jurusan.id')
            ->join('kelas', 'data_siswa_berprestasi.kelas_id = kelas.id')
            ->where('jurusan_id', $id)
            ->get()->result_array();
        return $query;
    }

    public function cariSiswa()
    {
        $keyword = $this->input->get('jurusan_id');
        $query = $this->db->select('data_siswa_berprestasi.*, data_jurusan.nama_jurusan')
            ->from('data_siswa_berprestasi')
            ->join('data_jurusan', 'data_siswa_berprestasi.jurusan_id = data_jurusan.id')
            ->where('jurusan_id', $keyword)
            ->get()->result_array();
        return $query;
    }

    public function editdatajurusan($id)
    {
        $data = [
            'nama_jurusan' => htmlspecialchars($this->input->post('jurusan', true))
        ];
        $this->db->where('id', $id);
        return $this->db->update('data_jurusan', $data);
    }

    public function hapusdatajurusan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_jurusan');
    }
}
