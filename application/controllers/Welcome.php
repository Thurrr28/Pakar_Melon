<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model'); // Load model mahasiswa_model
	}

	public function index()
	{
		$data['title'] = 'Presensi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])
			->row_array();
		$data['mahasiswa'] = $this->mahasiswa_model->get_all_mahasiswa(); // Ambil data mahasiswa dari model

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('absensi/index', $data);
		$this->load->view('templates/footer'); // Tampilkan view dengan data mahasiswa
	}

	public function update_absensi()
	{
		$nim = $this->input->post('nim');
		$result = $this->mahasiswa_model->update_absensi($nim);

		if ($result) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Updated successfully!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM not found!</div>');
		}

		redirect('absensi'); // Redirect ke halaman absensi setelah update
	}

	public function process_input()
	{
		$nim = $this->input->post('nim');
		$result = $this->mahasiswa_model->input_absensi($nim);

		if ($result) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successful Attendance!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM not found!</div>');
		}

		redirect('welcome/index');
	}

	public function input_absensi($nim)
	{
		// Periksa apakah mahasiswa dengan NIM tertentu sudah ada di database
		$mahasiswa = $this->mahasiswa_model->get_mahasiswa_by_nim($nim);

		if ($mahasiswa) {
			// Jika mahasiswa ditemukan, update status absensi menjadi 'Hadir' dan waktu_absensi dengan timestamp
			$this->mahasiswa_model->update_absensi($nim);
		} else {
			// Jika mahasiswa tidak ditemukan, Anda dapat menangani logika sesuai kebutuhan
			// Contoh: Menampilkan pesan kesalahan atau melakukan tindakan lainnya
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM not found!</div>');
		}

		redirect('welcome/index');
	}
	public function cancel_presensi()
	{
		$nim = $this->input->post('nim');
		$result = $this->mahasiswa_model->cancel_presensi($nim);

		if ($result) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Attendance canceled successfully!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM not found or no changes made!</div>');
		}

		redirect('welcome');
	}
}
