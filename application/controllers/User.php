<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'svg|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->Update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function tablelist()
    {
        $data['title'] = 'Table';

        // Mengambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Memuat model List_model dengan alias 'user'
        $this->load->model('List_model', 'user');

        // Mengambil data tabel dari List_model
        $data['datarps'] = $this->user->getTablelist();

        // Mengambil semua data dari tabel 'db_add'
        $data['table_rps'] = $this->db->get('table_rps')->result_array();

        // Memuat tampilan dengan data yang telah disiapkan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tablelist', $data);
        $this->load->view('templates/footer');
    }

    public function createrps()
    {
        $data['title'] = 'Create RPS';

        // Mengambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('List_model', 'list');

        $data['create'] = $this->list->getTablelist();
        $data['list'] = $this->db->get('table_rps')->result_array();

        $this->form_validation->set_rules('program_studi', 'Program_studi', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('mata_kuliah', 'Mata_kuliah', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('sks', 'Sks', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('gambaran_umum', 'Gambaran_umum');
        $this->form_validation->set_rules('capaian_pembelajaran', 'Capaian_pembelajaran');
        $this->form_validation->set_rules('prasyarat', 'Prasyarat');
        $this->form_validation->set_rules('kemampuan', 'Kemampuan');
        $this->form_validation->set_rules('indikator', 'Indikator');
        $this->form_validation->set_rules('bahan_kajian', 'Bahan_kajian');
        $this->form_validation->set_rules('metode_pembelajaran', 'Metode_pembelajaran');
        $this->form_validation->set_rules('waktu', 'Waktu');
        $this->form_validation->set_rules('metode_penilaian', 'Metode_penilaian');
        $this->form_validation->set_rules('bahan_ajar', 'Bahan_ajar');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas');
        $this->form_validation->set_rules('waktu_tugas', 'Waktu_tugas');
        $this->form_validation->set_rules('bobot', 'Bobot');
        $this->form_validation->set_rules('kriteria', 'Kriteria');
        $this->form_validation->set_rules('indikator_penilaian', 'Indikator_penilaian');
        $this->form_validation->set_rules('referensi', 'Referensi');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/createrps', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'program_studi' => $this->input->post('program_studi'),
                'kode' => $this->input->post('kode'),
                'mata_kuliah' => $this->input->post('mata_kuliah'),
                'semester' => $this->input->post('semester'),
                'sks' => $this->input->post('sks'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambaran_umum' => $this->input->post('gambaran_umum'),
                'capaian_pembelajaran' => $this->input->post('capaian_pembelajaran'),
                'prasyarat' => $this->input->post('prasyarat'),
                'kemampuan' => $this->input->post('kemampuan'),
                'indikator' => $this->input->post('indikator'),
                'bahan_kajian' => $this->input->post('bahan_kajian'),
                'metode_pembelajaran' => $this->input->post('metode_pembelajaran'),
                'waktu' => $this->input->post('waktu'),
                'metode_penilaian' => $this->input->post('metode_penilaian'),
                'bahan_ajar' => $this->input->post('bahan_ajar'),
                'aktivitas' => $this->input->post('aktivitas'),
                'waktu_tugas' => $this->input->post('waktu_tugas'),
                'bobot' => $this->input->post('bobot'),
                'kriteria' => $this->input->post('kriteria'),
                'indikator_penilaian' => $this->input->post('indikator_penilaian'),
                'referensi' => $this->input->post('referensi'),
            ];
            $this->db->insert('table_rps', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Added successfully!</div>');
            redirect('user/tablelist');
        }
    }

    public function deletemateri($id_materi)
    {
        $this->load->model('List_model', 'list');
        $this->list->deleteMateri($id_materi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted successfully!</div>');
        redirect('user/tablemateri');
    }
    public function delete($id_rps)
    {
        $this->load->model('List_model', 'list');
        $this->list->delete($id_rps);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted successfully!</div>');
        redirect('user/tablelist');
    }
    public function view($id)
    {
        // Memuat model List_model dengan alias 'user'
        $this->load->model('List_model');

        // Mengambil data tabel 'table_rps' dari List_model
        $data['datarps'] = $this->List_model->getDatarpsById($id);

        // Mengambil data tabel 'table_materi' dari List_model
        $data['datamateri'] = $this->List_model->getTablemateri();

        // Mengambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Memuat view dengan data yang diperlukan
        $this->load->view('user/view', $data);
        $this->load->view('templates/footer');
    }


    public function tablemateri()
    {
        $data['title'] = 'List Materi';

        // Mengambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Memuat model List_model dengan alias 'user'
        $this->load->model('List_model', 'user');

        // Mengambil data tabel dari List_model
        $data['datarps'] = $this->user->getTablemateri();

        // Mengambil semua data dari tabel 'db_add'
        $data['table_materi'] = $this->db->get('table_materi')->result_array();

        // Memuat tampilan dengan data yang telah disiapkan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tablemateri', $data);
        $this->load->view('templates/footer');
    }
    public function createmateri()
    {
        $data['title'] = 'Add Materi';

        // Mengambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('List_model', 'list');

        $data['create'] = $this->list->getTablemateri();
        $data['list'] = $this->db->get('table_materi')->result_array();

        $this->form_validation->set_rules('pertemuan', 'Pertemuan', 'required');
        $this->form_validation->set_rules('kemampuan_akhir', 'Kemampuan akhir', 'required');
        $this->form_validation->set_rules('indikator_materi', 'Indikator materi', 'required');
        $this->form_validation->set_rules('topik', 'Topik', 'required');
        $this->form_validation->set_rules('aktivitas_pembelajaran', 'Aktivitas pembelajaran', 'required');
        $this->form_validation->set_rules('waktu_matkul', 'Waktu_matkul', 'required');
        $this->form_validation->set_rules('penilaian', 'Penilaian', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/createmateri', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'pertemuan' => $this->input->post('pertemuan'),
                'kemampuan_akhir' => $this->input->post('kemampuan_akhir'),
                'indikator_materi' => $this->input->post('indikator_materi'),
                'topik' => $this->input->post('topik'),
                'aktivitas_pembelajaran' => $this->input->post('aktivitas_pembelajaran'),
                'waktu_matkul' => $this->input->post('waktu_matkul'),
                'penilaian' => $this->input->post('penilaian'),
            ];
            $this->db->insert('table_materi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Added successfully!</div>');
            redirect('user/tablemateri');
        }
    }
    public function editmateri($id)
    {
        $data['title'] = 'Edit Materi';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('List_model', 'list');
        $data['datarps'] = $this->list->getDataMateriById($id);

        $this->form_validation->set_rules('pertemuan', 'Pertemuan', 'required');
        $this->form_validation->set_rules('kemampuan_akhir', 'Kemampuan_akhir', 'required');
        $this->form_validation->set_rules('indikator_materi', 'Indikator_materi', 'required');
        $this->form_validation->set_rules('topik', 'Topik', 'required');
        $this->form_validation->set_rules('aktivitas_pembelajaran', 'Aktivitas_pembelajaran', 'required');
        $this->form_validation->set_rules('waktu_matkul', 'Waktu_matkul', 'required');
        $this->form_validation->set_rules('penilaian', 'Penilaian', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editmateri', $data);
            $this->load->view('templates/footer');
        } else {
            // Simpan semua data yang diperlukan sesuai dengan nama field yang benar
            $updatemateri = array(

                // Tambahkan field lain sesuai kebutuhan
                'pertemuan' => $this->input->post('pertemuan'),
                'penilaian' => $this->input->post('penilaian'),
                'indikator_materi' => $this->input->post('indikator_materi'),
                'topik' => $this->input->post('topik'),
                'aktivitas_pembelajaran' => $this->input->post('aktivitas_pembelajaran'),
                'waktu_matkul' => $this->input->post('waktu_matkul'),
                'kemampuan_akhir' => $this->input->post('kemampuan_akhir')
            );
            $this->db->where('id_materi', $id);
            $this->db->update('table_materi', $updatemateri);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edited data success!</div>');
            redirect('user/tablemateri');
        }
    }

    public function jadwal()
    {
        $data['title'] = 'Jadwal Mengajar';

        // Mengambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Memuat model List_model dengan alias 'user'
        $this->load->model('List_model', 'user');

        // Mengambil data tabel dari List_model
        $data['datarps'] = $this->user->getTablejadwal();

        // Mengambil semua data dari tabel 'db_add'
        $data['jadwal'] = $this->db->get('jadwal')->result_array();

        // Memuat tampilan dengan data yang telah disiapkan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function editjadwal($id)
    {
        $data['title'] = 'Edit Jadwal';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('List_model', 'list');
        $data['datajadwal'] = $this->list->getTablejadwalById($id);

        $this->form_validation->set_rules('ruang', 'Ruang', 'required');
        $this->form_validation->set_rules('matkul', 'Matkul', 'required');
        $this->form_validation->set_rules('waktu_mengajar', 'Waktu_mengajar', 'required');
        $this->form_validation->set_rules('metode_pelajaran', 'Metode_pelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editjadwal', $data);
            $this->load->view('templates/footer');
        } else {
            // Simpan semua data yang diperlukan sesuai dengan nama field yang benar
            $updatejadwal = array(
                // Tambahkan field lain sesuai kebutuhan
                'ruang' => $this->input->post('ruang'),
                'matkul' => $this->input->post('matkul'),
                'waktu_mengajar' => $this->input->post('waktu_mengajar'),
                'metode_pelajaran' => $this->input->post('metode_pelajaran')
            );
            $this->db->where('id_jadwal', $id);
            $this->db->update('jadwal', $updatejadwal);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edited data success!</div>');
            redirect('user/jadwal');
        }
    }

    public function deletejadwal($id_jadwal)
    {
        $this->load->model('List_model', 'list');
        $this->list->deleteJadwal($id_jadwal);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted successfully!</div>');
        redirect('user/jadwal');
    }

    public function createjadwal()
    {
        $data['title'] = 'Add Jadwal';

        // Mengambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('List_model', 'list');

        $data['datarps'] = $this->list->getTablejadwal();
        $data['list'] = $this->db->get('jadwal')->result_array();

        $this->form_validation->set_rules('ruang', 'Ruang', 'required');
        $this->form_validation->set_rules('matkul', 'Matkul', 'required');
        $this->form_validation->set_rules('waktu_mengajar', 'Waktu_mengajar', 'required');
        $this->form_validation->set_rules('metode_pelajaran', 'Metode_pelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/jadwal', $data);
            $this->load->view('templates/footer');
        } else {
            // Simpan semua data yang diperlukan sesuai dengan nama field yang benar
            $data = array(

                // Tambahkan field lain sesuai kebutuhan
                'ruang' => $this->input->post('ruang'),
                'matkul' => $this->input->post('matkul'),
                'waktu_mengajar' => $this->input->post('waktu_mengajar'),
                'metode_pelajaran' => $this->input->post('metode_pelajaran')
            );

            $this->db->insert('jadwal', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Added successfully!</div>');
            redirect('user/jadwal');
        }
    }
}
