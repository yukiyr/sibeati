<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("calon_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function adds_calon()
    {
        // echo 'Hello';
        $pendaftar_id = $this->input->post('pendaftar_id');

        for($i=0; $i < sizeof($pendaftar_id); $i++)
        {
            $data = array('pendaftar_id' => $pendaftar_id[$i]);
            $data['user_id'] = $this->session->userdata('user_id');
            $this->db->insert('calon',$data);
        }

        $this->session->set_flashdata('msg',"Voting Berhasil");
        $this->session->set_flashdata('msg_class','alert-success');
    
        return redirect('dashboard');
    }

    public function add_calon()
    {
        $this->load->model('calon_model');
        $pendaftar_id = $this->input->post('pendaftar_id');

        for($i=0; $i < sizeof($pendaftar_id); $i++)
        {
            $result = $this->calon_model->save_calon($pendaftar_id[$i]);
        }

        if($result != 0){
            //pendaftaran berhasil
            echo "<script>
            alert('Selamat, pemberian suara sukses');
            window.location='".site_url('dashboard')."';
            </script>";
        }
    }

    public function save_calon($beasiswaid = 0, $pendaftarid = 0){
        $this->load->model('pendaftar_model');
		$result = $this->pendaftar_model->save_pendaftar($beasiswaid, $biodataid);
        if($result != 0){
            //pendaftaran berhasil
            echo "<script>
            alert('Selamat, pendaftaran sukses');
            window.location='".site_url('pengajuan/periode')."';
            </script>";
        }
        else{
            //pendaftaran gagal
            echo "<script>
            alert('Maaf, pendaftaran gagal');
            window.location='".site_url('pengajuan/periode')."';
            </script>";
        }
    }
}
