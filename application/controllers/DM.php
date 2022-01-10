<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DM extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Perhitungan_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $db = (array)get_instance()->db;
        $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);
        $data_jurusan = mysqli_query($selectdb, "SELECT * FROM data_jurusan");
        $jumlah_jurusan = mysqli_num_rows($data_jurusan);
        $data_jurusan = $jumlah_jurusan;
        $data['jumlah_jurusan'] = $data_jurusan;

        $db = (array)get_instance()->db;
        $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);
        $data_kriteria = mysqli_query($selectdb, "SELECT * FROM data_kriteria");
        $jumlah_kriteria = mysqli_num_rows($data_kriteria);
        $data_kriteria = $jumlah_kriteria;
        $data['jumlah_kriteria'] = $data_kriteria;

        $db = (array)get_instance()->db;
        $selectdb = new mysqli('localhost', $db['username'], $db['password'], $db['database']);
        $data_siswa = mysqli_query($selectdb, "SELECT * FROM data_siswa_berprestasi");
        $jumlah_siswa = mysqli_num_rows($data_siswa);
        $data_siswa = $jumlah_siswa;
        $data['jumlah_siswa'] = $data_siswa;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dm/index', $data);
        $this->load->view('templates/footer');
    }

    // Lihat Data Siswa Berprestasi

    public function datasiswa()
    {
        $data['title'] = 'Data Siswa Berprestasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Siswa_model', 'jurusan');

        $data['dataSiswa'] = $this->jurusan->getDataSiswa();
        $data['tahun'] = $this->db->get('tahun_akademik')->result_array();
        $data['jurusan'] = $this->db->get('data_jurusan')->result_array();
        if ($this->input->get('jurusan_id')) {
            $data['dataSiswa'] = $this->jurusan->cariSiswa();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dm/datasiswa', $data);
        $this->load->view('templates/footer');
    }

    // Kelola Bobot Kriteria

    public function databobot()
    {
        $data['title'] = 'Kelola Bobot Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dataBobot'] = $this->db->get('data_kriteria')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dm/databobot', $data);
        $this->load->view('templates/footer');
    }

    public function editbobot($id)
    {
        $this->load->model('Bobot_model');
        $this->Bobot_model->editbobot($id);

        $kriteria = $this->db->select('SUM(bobot) AS bobot')
            ->from('data_kriteria')
            ->get()->row_array();


        if ($kriteria['bobot'] == 100) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data bobot kriteria berhasil diedit!</div>');
            redirect('dm/databobot');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Jumlah Bobot TIDAK BOLEH Lebih atau Kurang Dari 100! Silahkan Perbaiki Nilai Bobotnya.</div>');
            redirect('dm/databobot');
        }
    }

    // Perhitungan

    public function perhitungan()
    {
        $data['title'] = 'Perhitungan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Bobot_model');

        $kriteria = $this->db->select('SUM(bobot) AS bobot')
            ->from('data_kriteria')
            ->get()->row_array();

        if ($kriteria['bobot'] != 100) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Jumlah Bobot TIDAK BOLEH Lebih atau Kurang Dari 100! Silahkan Perbaiki Nilai Bobotnya.</div>');
        } else {
            $this->load->model('Siswa_model', 'jurusan');

            $data['dataSiswa'] = $this->jurusan->getDataSiswa();
            $data['tahun'] = $this->db->get('tahun_akademik')->result_array();
            $data['jurusan'] = $this->db->get('data_jurusan')->result_array();
            $data['databobot'] = $this->db->select('(bobot / 100) as bobot')->from('data_kriteria')->get()->result_array();
            $data['alternatif'] = $this->db->get('data_siswa_berprestasi')->result_array();
            if ($this->input->get('tahun_id')) {
                $data['alternatif'] = $this->Perhitungan_model->hitungPrestasi();
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dm/perhitungan', $data);
        $this->load->view('templates/footer');
    }



    // Laporan

    public function laporan()
    {
        $data['title'] = 'Laporan Siswa Berprestasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Siswa_model', 'jurusan');
        $this->load->model('Perhitungan_model');

        $data['dataSiswa'] = $this->jurusan->getDataSiswa();
        $data['tahun'] = $this->db->get('tahun_akademik')->result_array();
        $data['jurusan'] = $this->db->get('data_jurusan')->result_array();
        $data['alternatif'] = $this->db->get('data_siswa_berprestasi')->result_array();
        if ($this->input->get('tahun_id')) {
            $data['alternatif'] = $this->Perhitungan_model->hitungPrestasi();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dm/laporan', $data);
        $this->load->view('templates/footer');
    }
}
