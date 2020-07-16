<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("beasiswa_model");
        $this->load->library('form_validation');
        $this->load->model("auth/users");
		if($this->users->isNotLogin()) redirect(site_url('auth'));
    }

    public function index()
    {
        $data["beasiswa"] = $this->beasiswa_model->getAll();
        $this->template->load('template', 'periode/list', 'Pengajuan', $data);
    }
}
