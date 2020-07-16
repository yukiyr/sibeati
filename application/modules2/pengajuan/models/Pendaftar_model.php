<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar_model extends CI_Model
{
    private $_table = "pendaftar";

    public $pendaftar_id;
    public $beasiswa_id;
    public $biodata_id;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pendaftar_id" => $id])->row();
    }

    //insert ke tabel pendaftar
    public function save_pendaftar($beasiswaid, $biodataid)
    {
        $this->beasiswa_id = $beasiswaid;
        $this->biodata_id = $biodataid;
        return $this->db->insert($this->_table, $this);
    }
}
