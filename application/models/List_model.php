<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_model extends CI_Model
{
    public function delete($id_rps)
    {
        $this->db->where('id_rps', $id_rps);
        $this->db->delete('table_rps');
    }

    public function getDataHama()
    {
        return $this->db->get('data_hama')->result_array();
    }
    public function getDataPenyakit()
    {
        return $this->db->get('data_penyakit')->result_array();
    }

    public function getDataHamaid($id)
    {
        return $this->db->get_where('data_hama', ['id' => $id])->row_array();
    }
    public function getDataPenyakitid($id)
    {
        return $this->db->get_where('data_penyakit', ['id' => $id])->row_array();
    }

    public function deletehama($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_hama');
    }
    public function deletepenyakit($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_penyakit');
    }
}
