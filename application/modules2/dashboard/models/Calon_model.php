<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Calon_model extends CI_Model
{
    private $_table = "calon";

    public $calon_id;
    public $user_id;
    public $pendaftar_id;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["calon_id" => $id])->result();
    }

    public function voting_exists($pendaftarid)
    {
        $userid = $this->session->userdata('user_id');
        $this->db->where(['pendaftar_id'=>$pendaftarid, 'user_id'=>$userid]);
        $query = $this->db->get('calon');
        if ($query->num_rows() > 0){
            return 1;
        }
        else{
            return 0;
        }
    }

    //insert ke tabel calon
    public function save_calon($pendaftarid)
    {
        $this->user_id = $this->session->userdata('user_id');
        $this->pendaftar_id = $pendaftarid;
        $status = $this->voting_exists($pendaftarid); 
        if( $status == 0)
        {
            return $this->db->insert($this->_table, $this);
        }
        else
        {
            echo "<script>
            alert('Maaf terdapat peserta yang sama dengan voting sebelumnya');
            window.location='".site_url('dashboard')."';
            </script>";
        }
    }
}
