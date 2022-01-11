<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jumlah_jurusan'] = $this->db->get('data_jurusan')->num_rows();

        $data['jumlah_kriteria'] = $this->db->get('data_kriteria')->num_rows();

        $data['jumlah_siswa'] = $this->db->get('data_siswa_berprestasi')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }



    // Kelola Data User

    public function datauser()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('User_model', 'role');

        $data['dataUser'] = $this->role->getDataUser();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[5]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datauser', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                // 'role_id' => $this->input->post('role_id')
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data user berhasil ditambahkan!</div>');
            redirect('admin/datauser');
        }
    }

    public function editdatauser($id)
    {
        $this->load->model('User_model');
        $this->User_model->editdatauser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data user berhasil diedit!</div>');
        redirect('admin/datauser');
    }

    public function hapusdatauser($id)
    {
        $this->load->model('User_model');
        $this->User_model->hapusdatauser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data user berhasil dihapus!</div>');
        redirect('admin/datauser');
    }


    // Kelola Data Jurusan

    public function datajurusan()
    {
        $data['title'] = 'Data Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jurusan'] = $this->db->get('data_jurusan')->result_array();

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datajurusan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('data_jurusan', ['nama_jurusan' => $this->input->post('jurusan')]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data jurusan berhasil ditambahkan!</div>');
            redirect('admin/datajurusan');
        }
    }

    public function detaildatajurusan($id)
    {
        $data['title'] = 'Detail Data Jurusan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Jurusan_model');

        $dataSiswa = $this->Jurusan_model->detaildatajurusan($id);
        $data['dataSiswa'] = $dataSiswa;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detaildatajurusan', $data);
        $this->load->view('templates/footer');
    }

    public function editdatajurusan($id)
    {
        $this->load->model('Jurusan_model');
        $this->Jurusan_model->editdatajurusan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data jurusan berhasil diedit!</div>');
        redirect('admin/datajurusan');
    }

    public function hapusdatajurusan($id)
    {
        $this->load->model('Jurusan_model');
        $this->Jurusan_model->hapusdatajurusan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data jurusan berhasil dihapus!</div>');
        redirect('admin/datajurusan');
    }


    // Kelola Data Kriteria

    public function datakriteria()
    {
        $data['title'] = 'Data Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kriteria'] = $this->db->get('data_kriteria')->result_array();

        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datakriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('data_kriteria', ['kriteria' => $this->input->post('kriteria')]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data kriteria berhasil ditambahkan!</div>');
            redirect('admin/datakriteria');
        }
    }

    public function editdatakriteria($id)
    {
        $this->load->model('Kriteria_model');
        $this->Kriteria_model->editdatakriteria($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data kriteria berhasil diedit!</div>');
        redirect('admin/datakriteria');
    }

    public function hapusdatakriteria($id)
    {
        $this->load->model('Kriteria_model');
        $this->Kriteria_model->hapusdatakriteria($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data kriteria berhasil dihapus!</div>');
        redirect('admin/datakriteria');
    }


    // Kelola Data Nilai Kriteria

    public function datanilaikriteria()
    {
        $data['title'] = 'Data Nilai Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('NilaiKriteria_model', 'kriteria');

        $data['nilaiKriteria'] = $this->kriteria->getSubKriteria();
        $data['kriteria'] = $this->db->get('data_kriteria')->result_array();

        $this->form_validation->set_rules('kriteria_id', 'Kriteria', 'required');
        $this->form_validation->set_rules('rentang_nilai', 'Rentang Nilai', 'required');
        $this->form_validation->set_rules('nilai_kriteria', 'Nilai', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datanilaikriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kriteria_id' => $this->input->post('kriteria_id'),
                'rentang_nilai' => $this->input->post('rentang_nilai'),
                'nilai' => $this->input->post('nilai_kriteria')
            ];
            $this->db->insert('data_sub_kriteria', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data nilai kriteria berhasil ditambahkan!</div>');
            redirect('admin/datanilaikriteria');
        }
    }

    public function editdatanilaikriteria($id)
    {
        $this->load->model('NilaiKriteria_model');
        $this->NilaiKriteria_model->editdatanilaikriteria($id);

        // $data['nilaiKriteria'] = $this->kriteria->getSubKriteria();
        // $data['kriteria'] = $this->db->get('data_kriteria')->result_array();
        // $data['rentang_nilai'] = $this->db->get('data_sub_kriteria')->result_array();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Nilai kriteria berhasil diedit!</div>');
        redirect('admin/datanilaikriteria');
    }

    public function hapusdatanilaikriteria($id)
    {
        $this->load->model('NilaiKriteria_model');
        $this->NilaiKriteria_model->hapusdatanilaikriteria($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data nilai kriteria berhasil dihapus!</div>');
        redirect('admin/datanilaikriteria');
    }


    // Kelola Data Siswa Berprestasi

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
        $data['kelas'] = $this->db->get('kelas')->result_array();

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

        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('jurusan_id', 'Jurusan', 'required');
        $this->form_validation->set_rules('tahun_id', 'Tahun', 'required');
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
        $this->form_validation->set_rules('nilai_rapot', 'Nilai Rapot', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datasiswa', $data);
            $this->load->view('templates/footer');
        } else {
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
            $this->db->insert('data_siswa_berprestasi', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data siswa berhasil ditambahkan!</div>');
            redirect('admin/datasiswa');
        }
    }

    public function editdatasiswa($id)
    {
        $this->load->model('Siswa_model');
        $this->Siswa_model->editdatasiswa($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data siswa berprestasi berhasil diedit!</div>');
        redirect('admin/datasiswa');
    }

    public function hapusdatasiswa($id)
    {
        $this->load->model('Siswa_model');
        $this->Siswa_model->hapusdatasiswa($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data siswa berhasil dihapus!</div>');
        redirect('admin/datasiswa');
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
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footer');
    }
}
