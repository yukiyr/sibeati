<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar_model extends CI_Model
{
    private $_table = "pendaftar";

    public $pendaftar_id;
    public $beasiswa_id;
    public $biodata_id;

    public function getAll()
    {
        $this->db->select('tahun, periode, nrp, nama_lengkap, penghasilan_ortu, ukt, ipk, pendaftar_id');
        $this->db->from('pendaftar');
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $query = $this->db->get();
        return $query->result();
    }

    // data yang sama cuma diambil satu (karena untuk filter)
    public function getDistinct(){
        $this->db->distinct();
        $this->db->select('tahun, periode');
        $this->db->from('pendaftar');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $query = $this->db->get();
        return $query->result();
    }

    // query where sesuai input tahun dan periode
    public function getWhere($tahun, $periode)
    {
        $this->db->select('nrp, nama_lengkap, penghasilan_ortu, ukt, ipk, pendaftar_id, biodata.biodata_id, beasiswa.beasiswa_id');
        $this->db->from('pendaftar');
        $this->db->join('biodata', 'biodata.biodata_id = pendaftar.biodata_id');
        $this->db->join('beasiswa', 'beasiswa.beasiswa_id = pendaftar.beasiswa_id');
        $this->db->where(['tahun'=>$tahun, 'periode'=>$periode]);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pendaftar_id" => $id])->row();
    }
}
