<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function getDataSiswa()
    {
        $query = $this->db->select('data_siswa_berprestasi.*, data_jurusan.nama_jurusan, kelas.kelas, tahun_akademik.tahun as tahun')
            ->from('data_siswa_berprestasi')
            ->join('tahun_akademik', 'data_siswa_berprestasi.tahun_id = tahun_akademik.id')
            ->join('data_jurusan', 'data_siswa_berprestasi.jurusan_id = data_jurusan.id')
            ->join('kelas', 'data_siswa_berprestasi.kelas_id = kelas.id')
            ->order_by('tahun_akademik.id')
            ->get()->result_array();
        return $query;
    }

    public function cariSiswa()
    {
        $keyword = $this->input->get('jurusan_id');
        $query = $this->db->select('data_siswa_berprestasi.*, data_jurusan.nama_jurusan, kelas.kelas, tahun_akademik.tahun as tahun')
            ->from('data_siswa_berprestasi')
            ->join('tahun_akademik', 'data_siswa_berprestasi.tahun_id = tahun_akademik.id')
            ->join('data_jurusan', 'data_siswa_berprestasi.jurusan_id = data_jurusan.id')
            ->join('kelas', 'data_siswa_berprestasi.kelas_id = kelas.id')
            ->where('jurusan_id', $keyword)
            ->get()->result_array();
        return $query;
    }

    public function editdatasiswa($id)
    {
        $n_rapot = $this->input->post('nilai_rapot');
        $n_absen = $this->input->post('nilai_absensi');
        $n_ekskul = $this->input->post('nilai_ekskul');
        $n_kepribadian = $this->input->post('nilai_kepribadian');

        if ($n_rapot >= 85 and $n_rapot <= 100) {
            $alt_rapot = 4;
        } elseif ($n_rapot >= 80 and $n_rapot <= 84) {
            $alt_rapot = 3;
        } elseif ($n_rapot >= 75 and $n_rapot <= 79) {
            $alt_rapot = 2;
        } elseif ($n_rapot <= 74) {
            $alt_rapot = 1;
        }

        if ($n_absen <= 0) {
            $alt_absensi = 4;
        } elseif ($n_absen >= 1 and $n_absen <= 2) {
            $alt_absensi = 3;
        } elseif ($n_absen >= 3 and $n_absen <= 4) {
            $alt_absensi = 2;
        } elseif ($n_absen >= 5) {
            $alt_absensi = 1;
        }

        if ($n_ekskul >= 3) {
            $alt_ekskul = 3;
        } elseif ($n_ekskul >= 2 and $n_ekskul < 3) {
            $alt_ekskul = 2;
        } elseif ($n_ekskul >= 1 and $n_ekskul < 2) {
            $alt_ekskul = 1;
        }

        if ($n_kepribadian >= 85 and $n_kepribadian <= 100) {
            $alt_kepribadian = 4;
        } elseif ($n_kepribadian >= 80 and $n_kepribadian <= 84) {
            $alt_kepribadian = 3;
        } elseif ($n_kepribadian >= 75 and $n_kepribadian <= 79) {
            $alt_kepribadian = 2;
        } elseif ($n_kepribadian <= 74) {
            $alt_kepribadian = 1;
        }


        $data = [
            'tahun_id' => $this->input->post('tahun_id'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'jurusan_id' => $this->input->post('jurusan_id'),
            'kelas_id' => $this->input->post('kelas_id'),
            'nilai_rapot' => $this->input->post('nilai_rapot'),
            'nilai_absensi' => $this->input->post('nilai_absensi'),
            'nilai_ekskul' => $this->input->post('nilai_ekskul'),
            'nilai_kepribadian' => $this->input->post('nilai_kepribadian'),
            'alt_rapot' => $alt_rapot,
            'alt_absensi' => $alt_absensi,
            'alt_ekskul' => $alt_ekskul,
            'alt_kepribadian' => $alt_kepribadian
        ];
        $this->db->where('id', $id);
        return $this->db->update('data_siswa_berprestasi', $data);
    }

    public function hapusdatasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_siswa_berprestasi');
    }
}
