<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar_model extends CI_Model
{
    private $_table = "pendaftar";

    public $pendaftar_id;
    public $beasiswa_id;
    public $biodata_id;

	// Join inner tabel pendaftar & biodata
    public function getAll()
    {
        $this->db->select('nrp, nama_lengkap, penghasilan_ortu, ukt, ipk, pendaftar_id');
        $this->db->from('pendaftar');
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pendaftar_id" => $id])->row();
    }
}
