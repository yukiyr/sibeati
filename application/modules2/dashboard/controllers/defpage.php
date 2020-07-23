<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class defpage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->has_userdata('username')){
			$role = $this->session->userdata('role');
			$data = array();
			if($role == 'mahasiswa'){
				$berita = $this->load->model('Berita_model', 'berita');
				$data['berita'] = $this->berita->getAll();
				$this->template->load('template', 'role/' . $role, 'Dashboard', $data);
			}
			else{
				$pendaftar = $this->load->model('Pendaftar_model', 'pendaftar');
				$calon = $this->load->model('Calon_model', 'calon');

				$data['pendaftar'] = $this->pendaftar->getAll();
				$data['distinct'] = $this->pendaftar->getDistinct(); //hasil hapus data "tahun" dan "periode" yang sama

				$tahun = $this->input->post('tahun');
				$periode = $this->input->post('periode');
				$data['records'] = $this->pendaftar->getWhere($tahun,$periode); //hasil filter

				$data['calon'] = $this->pendaftar->getCalon(); 
				$data['beasiswa'] = $this->pendaftar->getBeasiswa();
				$data['jumlah'] = $this->pendaftar->countVote();
				
				$this->template->load('templatevoter', 'role/' . $role, 'Dashboard', $data);
			}
			
		}
		else{
			redirect(site_url('auth'));
		}
	}
}
