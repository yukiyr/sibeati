<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penerima extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("penerima_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		    if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function add_penerima()
    {
        $this->load->model('penerima_model');
        $calon_id = $this->input->post('calon_id');

        for($i=0; $i < sizeof($calon_id); $i++)
        {
            $result = $this->penerima_model->save_penerima($calon_id[$i]);
        }

        if($result != 0){
            //seleksi akhir berhasil
            echo "<script>
            alert('Selamat, seleksi akhir sukses');
            window.location='".site_url('dashboard')."';
            </script>";
        }
    }
}
