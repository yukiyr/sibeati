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

    public function add_calon()
    {
        $this->load->model('calon_model');
        $pendaftar_id = $this->input->post('pendaftar_id');

        for($i=0; $i < sizeof($pendaftar_id); $i++)
        {
            $result = $this->calon_model->save_calon($pendaftar_id[$i]);
        }

        if($result != 0){
            //pemberian suara berhasil
            echo "<script>
            alert('Selamat, pemberian suara sukses');
            window.location='".site_url('dashboard')."';
            </script>";
        }
    }
}
