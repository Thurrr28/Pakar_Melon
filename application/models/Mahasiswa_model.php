<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    public function get_all_mahasiswa() {
        return $this->db->get('mahasiswa')->result();
    }

    public function update_absensi($nim) {
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa', array('status_absensi' => 'Hadir', 'waktu' => date('Y-m-d H:i:s')));

        // Mengembalikan TRUE jika data berhasil diupdate, FALSE jika tidak ada perubahan (NIM tidak ditemukan)
        return $this->db->affected_rows() > 0;
    }

    public function input_absensi($nim) {
        $mahasiswa = $this->get_mahasiswa_by_nim($nim);

        if ($mahasiswa) {
            $this->update_absensi($nim);
        } else {
            // Mengembalikan FALSE jika NIM tidak ditemukan
            return FALSE;
        }

        // Mengembalikan TRUE jika data berhasil diupdate
        return TRUE;
    }

    public function get_mahasiswa_by_nim($nim) {
        return $this->db->get_where('mahasiswa', array('nim' => $nim))->row();
    }
    public function cancel_presensi($nim) {
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa', array('status_absensi' => 'Tidak Hadir', 'waktu' => NULL));

        // Mengembalikan TRUE jika data berhasil diupdate, FALSE jika tidak ada perubahan (NIM tidak ditemukan)
        return $this->db->affected_rows() > 0;
    }

}
