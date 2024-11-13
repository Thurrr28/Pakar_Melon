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

    public function hama()
    {
        $data['title'] = 'Hama';

        // Mengambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Memuat model List_model dengan alias 'user'
        $this->load->model('List_model', 'user');

        // Mengambil data tabel dari List_model
        $data['hama'] = $this->user->getDataHama();

        // Mengambil semua data dari tabel 'db_add'
        $data['hama'] = $this->db->get('data_hama')->result_array();

        // Memuat tampilan dengan data yang telah disiapkan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/hama', $data);
        $this->load->view('templates/footer');
    }

    public function penyakit()
    {
        $data['title'] = 'Penyakit';

        // Mengambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Memuat model List_model dengan alias 'user'
        $this->load->model('List_model', 'user');

        // Mengambil data tabel dari List_model
        $data['penyakit'] = $this->user->getDataPenyakit();

        // Mengambil semua data dari tabel 'db_add'
        $data['penyakit'] = $this->db->get('data_penyakit')->result_array();

        // Memuat tampilan dengan data yang telah disiapkan
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/penyakit', $data);
        $this->load->view('templates/footer');
    }

    public function createHama()
    {
        $data['title'] = 'Tambah Hama';

        // Mengambil data user dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('List_model', 'list');
        $data['datarps'] = $this->list->getDataHama();
        $data['list'] = $this->db->get('data_hama')->result_array();

        $this->form_validation->set_rules('nama_hama', 'Nama Hama', 'required');
        $this->form_validation->set_rules('bagian_yang_diserang', 'Bagian yang Diserang', 'required');
        $this->form_validation->set_rules('ciri_daun', 'Ciri Daun', 'required');
        $this->form_validation->set_rules('ciri_akar', 'Ciri Akar', 'required');
        $this->form_validation->set_rules('ciri_batang', 'Ciri Batang', 'required');
        $this->form_validation->set_rules('ciri_buah', 'Ciri Buah', 'required');
        $this->form_validation->set_rules('ciri_bunga', 'Ciri Bunga', 'required');
        $this->form_validation->set_rules('ciri_khusus', 'Ciri Khusus', 'required');
        $this->form_validation->set_rules('cara_mengatasi', 'Cara Mengatasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/createhama', $data);
            $this->load->view('templates/footer');
        } else {
            // Configure file upload settings
            $config['upload_path'] = './assets/img/fotohama/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // Max size in KB
            $config['file_name'] = time() . '_' . $_FILES['gambar_hama']['name']; // Append timestamp to original file name

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_hama')) {
                $fileData = $this->upload->data();
                $gambar_hama = $fileData['file_name']; // Get the file name

                // Prepare data for inserting into database
                $data = array(
                    'nama_hama' => $this->input->post('nama_hama'),
                    'bagian_yang_diserang' => $this->input->post('bagian_yang_diserang'),
                    'ciri_daun' => $this->input->post('ciri_daun'),
                    'ciri_akar' => $this->input->post('ciri_akar'),
                    'ciri_batang' => $this->input->post('ciri_batang'),
                    'ciri_buah' => $this->input->post('ciri_buah'),
                    'ciri_bunga' => $this->input->post('ciri_bunga'),
                    'ciri_khusus' => $this->input->post('ciri_khusus'),
                    'cara_mengatasi' => $this->input->post('cara_mengatasi'),
                    'gambar_hama' => $gambar_hama
                );

                // Insert data into database
                $this->db->insert('data_hama', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Added successfully!</div>');
                redirect('user/hama');
            } else {
                // Handle upload error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Image upload failed: ' . $this->upload->display_errors() . '</div>');
                redirect('user/createHama');
            }
        }
    }


    public function createPenyakit()
    {
        $data['title'] = 'tambah penyakit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('List_model', 'list');
        $data['datarps'] = $this->list->getDataPenyakit();
        $data['list'] = $this->db->get('data_penyakit')->result_array();

        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('bagian_yang_diserang', 'Bagian yang Diserang', 'required');
        $this->form_validation->set_rules('ciri_daun', 'Ciri Daun', 'required');
        $this->form_validation->set_rules('ciri_akar', 'Ciri Akar', 'required');
        $this->form_validation->set_rules('ciri_batang', 'Ciri Batang', 'required');
        $this->form_validation->set_rules('ciri_buah', 'Ciri Buah', 'required');
        $this->form_validation->set_rules('ciri_bunga', 'Ciri Bunga', 'required');
        $this->form_validation->set_rules('ciri_khusus', 'Ciri Khusus', 'required');
        $this->form_validation->set_rules('cara_mengatasi', 'Cara Mengatasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/createpenyakit', $data);
            $this->load->view('templates/footer');
        } else {
            // Configure file upload settings
            $config['upload_path'] = './assets/img/fotopenyakit/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 10000; // Max size in KB
            $config['file_name'] = time() . '_' . $_FILES['gambar']['name']; // Append timestamp to original file name
            $this->load->library('upload', $config);

            // Attempt to upload file
            if ($this->upload->do_upload('gambar')) {
                $fileData = $this->upload->data();
            } else {
                // Handle upload error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Image upload failed: ' . $this->upload->display_errors() . '</div>');
                redirect('user/penyakit');
                return; // Exit function if upload fails
            }

            // Prepare data for database insertion
            $data = [
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'bagian_yang_diserang' => $this->input->post('bagian_yang_diserang'),
                'ciri_daun' => $this->input->post('ciri_daun'),
                'ciri_akar' => $this->input->post('ciri_akar'),
                'ciri_batang' => $this->input->post('ciri_batang'),
                'ciri_buah' => $this->input->post('ciri_buah'),
                'ciri_bunga' => $this->input->post('ciri_bunga'),
                'ciri_khusus' => $this->input->post('ciri_khusus'),
                'cara_mengatasi' => $this->input->post('cara_mengatasi'),
                'gambar' => $fileData['file_name'] // Save the unique file name
            ];

            $this->db->insert('data_penyakit', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Added successfully!</div>');
            redirect('user/penyakit');
        }
    }


    public function editHama($id)
    {
        $data['title'] = 'Edit Hama';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('List_model', 'list');
        $data['datahama'] = $this->list->getDataHamaid($id);

        $this->form_validation->set_rules('nama_hama', 'Nama Hama', 'required');
        $this->form_validation->set_rules('bagian_yang_diserang', 'Bagian yang Diserang', 'required');
        $this->form_validation->set_rules('ciri_daun', 'Ciri Daun', 'required');
        $this->form_validation->set_rules('ciri_akar', 'Ciri Akar', 'required');
        $this->form_validation->set_rules('ciri_batang', 'Ciri Batang', 'required');
        $this->form_validation->set_rules('ciri_buah', 'Ciri Buah', 'required');
        $this->form_validation->set_rules('ciri_bunga', 'Ciri Bunga', 'required');
        $this->form_validation->set_rules('ciri_khusus', 'Ciri Khusus', 'required');
        $this->form_validation->set_rules('cara_mengatasi', 'Cara Mengatasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edithama', $data);
            $this->load->view('templates/footer');
        } else {
            // Prepare data for updating
            $dataUpdate = array(
                'nama_hama' => $this->input->post('nama_hama'),
                'bagian_yang_diserang' => $this->input->post('bagian_yang_diserang'),
                'ciri_daun' => $this->input->post('ciri_daun'),
                'ciri_akar' => $this->input->post('ciri_akar'),
                'ciri_batang' => $this->input->post('ciri_batang'),
                'ciri_buah' => $this->input->post('ciri_buah'),
                'ciri_bunga' => $this->input->post('ciri_bunga'),
                'ciri_khusus' => $this->input->post('ciri_khusus'),
                'cara_mengatasi' => $this->input->post('cara_mengatasi')
            );

            // Check if a new image file is uploaded
            if (!empty($_FILES['gambar_hama']['name'])) {
                // Configure file upload settings
                $config['upload_path'] = './assets/img/fotohama/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 2048; // Max size in KB
                $config['file_name'] = time() . '_' . $_FILES['gambar_hama']['name']; // Unique filename with timestamp

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_hama')) {
                    // Delete old image if a new one is uploaded
                    if ($data['datahama']['gambar_hama']) {
                        unlink('./assets/img/fotohama/' . $data['datahama']['gambar_hama']);
                    }

                    // Save new image file name to database
                    $fileData = $this->upload->data();
                    $dataUpdate['gambar_hama'] = $fileData['file_name'];
                } else {
                    // Handle upload error
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Image upload failed: ' . $this->upload->display_errors() . '</div>');
                    redirect('user/editHama/' . $id);
                    return;
                }
            }

            // Update database record
            $this->db->where('id', $id);
            $this->db->update('data_hama', $dataUpdate);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit successful!</div>');
            redirect('user/hama');
        }
    }


    public function editPenyakit($id)
    {
        $data['title'] = 'Edit Penyakit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('List_model', 'list');
        $data['datapenyakit'] = $this->list->getDataPenyakitid($id);

        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('bagian_yang_diserang', 'Bagian yang Diserang', 'required');
        $this->form_validation->set_rules('ciri_daun', 'Ciri Daun', 'required');
        $this->form_validation->set_rules('ciri_akar', 'Ciri Akar', 'required');
        $this->form_validation->set_rules('ciri_batang', 'Ciri Batang', 'required');
        $this->form_validation->set_rules('ciri_buah', 'Ciri Buah', 'required');
        $this->form_validation->set_rules('ciri_bunga', 'Ciri Bunga', 'required');
        $this->form_validation->set_rules('ciri_khusus', 'Ciri Khusus', 'required');
        $this->form_validation->set_rules('cara_mengatasi', 'Cara Mengatasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editpenyakit', $data);
            $this->load->view('templates/footer');
        } else {
            // Prepare data for updating
            $updateData = [
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'bagian_yang_diserang' => $this->input->post('bagian_yang_diserang'),
                'ciri_daun' => $this->input->post('ciri_daun'),
                'ciri_akar' => $this->input->post('ciri_akar'),
                'ciri_batang' => $this->input->post('ciri_batang'),
                'ciri_buah' => $this->input->post('ciri_buah'),
                'ciri_bunga' => $this->input->post('ciri_bunga'),
                'ciri_khusus' => $this->input->post('ciri_khusus'),
                'cara_mengatasi' => $this->input->post('cara_mengatasi')
            ];

            // Configure file upload settings
            $config['upload_path'] = './assets/img/fotopenyakit/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // Max size in KB
            $config['file_name'] = time() . '_' . $_FILES['gambar']['name']; // Append timestamp to original file name
            $this->load->library('upload', $config);

            // Check if there is a new file to upload
            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    $fileData = $this->upload->data();

                    // Delete old image if exists
                    $oldImage = $data['datapenyakit']['gambar'];
                    if ($oldImage) {
                        unlink(FCPATH . 'assets/img/fotopenyakit/' . $oldImage);
                    }

                    // Set new file name to be updated in database
                    $updateData['gambar'] = $fileData['file_name'];
                } else {
                    // Handle upload error
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Image upload failed: ' . $this->upload->display_errors() . '</div>');
                    redirect('user/penyakit');
                    return; // Exit function if upload fails
                }
            }

            // Update database
            $this->db->where('id', $id);
            $this->db->update('data_penyakit', $updateData);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edited data successfully!</div>');
            redirect('user/penyakit');
        }
    }


    public function deletehama($id)
    {
        $this->load->model('List_model', 'list');
        $this->list->deletehama($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted successfully!</div>');
        redirect('user/hama');
    }
    public function deletepenyakit($id)
    {
        $this->load->model('List_model', 'list');
        $this->list->deletepenyakit($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted successfully!</div>');
        redirect('user/penyakit');
    }
}
