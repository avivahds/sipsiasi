<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan_model extends CI_Model
{
    public function hitungPrestasi()
    {
        $tahun = $this->input->get('tahun_id');
        $jurusan = $this->input->get('jurusan_id');

        $query = $this->db->select('data_siswa_berprestasi.*, data_jurusan.nama_jurusan, kelas.kelas, tahun_akademik.tahun as tahun')
            ->from('data_siswa_berprestasi')
            ->join('tahun_akademik', 'data_siswa_berprestasi.tahun_id = tahun_akademik.id')
            ->join('data_jurusan', 'data_siswa_berprestasi.jurusan_id = data_jurusan.id')
            ->join('kelas', 'data_siswa_berprestasi.kelas_id = kelas.id')
            ->where('jurusan_id', $jurusan)
            ->where('tahun_id', $tahun)
            ->get()->result_array();
        return $query;
    }
}
