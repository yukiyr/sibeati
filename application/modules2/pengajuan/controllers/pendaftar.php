<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pendaftar_model");
        $this->load->library('form_validation');
        $this->load->library('fungsi');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function save_pendaftar(){
        $this->load->model('pendaftar_model');
        $beasiswaid = $this->fungsi->periode_beasiswa()->beasiswa_id; //ambil nilai beasiswa_id dari folder app/modules/pengajuan/libraries/fungsi
        $biodataid = $this->fungsi->biodata_beasiswa()->biodata_id; //ambil nilai biodata_id dari folder app/modules/pengajuan/libraries/fungsi

		$result = $this->pendaftar_model->save_pendaftar($beasiswaid, $biodataid);
        if($result != 0){
            //pendaftaran berhasil
            echo "<script>
            alert('Selamat, pendaftaran sukses');
            window.location='".site_url('pengajuan/diri')."';
            </script>";
        }
        else{
            //pendaftaran gagal
            echo "<script>
            alert('Maaf, pendaftaran gagal');
            window.location='".site_url('pengajuan/diri')."';
            </script>";
        }
    }
}
