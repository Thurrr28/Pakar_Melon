<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_model extends CI_Model
{
    public function getTablelist()
    {
        return $this->db->get('table_rps')->result_array();
    }
    public function getDatarpsById($id)
    {
        return $this->db->get_where('table_rps', ['id_rps' => $id])->row_array();
    }
    public function getDataMateriById($id)
    {
        return $this->db->get_where('table_materi', ['id_materi' => $id])->row_array();
    }
    public function getTablemateri()
    {
        return $this->db->get('table_materi')->result_array();
    }
    public function getTablejadwal()
    {
        return $this->db->get('jadwal')->result_array();
    }
    public function getTablejadwalById($id)
    {
        return $this->db->get_where('jadwal', ['id_jadwal' => $id])->row_array();
    }
    public function delete($id_rps)
    {
        $this->db->where('id_rps', $id_rps);
        $this->db->delete('table_rps');
    }
    public function deleteMateri($id_materi)
    {
        $this->db->where('id_materi', $id_materi);
        $this->db->delete('table_materi');
    }
    public function deleteJadwal($id_jadwal)
    {
        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->delete('jadwal');
    }
}
