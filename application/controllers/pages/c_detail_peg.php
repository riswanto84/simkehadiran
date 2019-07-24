<?php

class c_detail_peg extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Pegawai');
    	$this->load->helper('url');

		//load model admin
		$this->load->model('admin');
	}

	public function index(){
			$nip = $this->input->post('nip');
			$satker = $this->input->post('satker');
			$unit_org = $this->input->post('unit_org');
			$data['nama_kantor'] = $this->input->post('nama_kantor');
			$data['unit_org'] = $unit_org;
			$data['namasatker'] = $satker;
			$data['nip'] = $this->M_Pegawai->get_Detil_Pegawai($nip)->result();
			$data['user_absen'] = $this->M_Pegawai->get_User_Absen($nip)->result();

			if($this->admin->logged_id())
			{
			$this->load->view('templates/v_header');
			$this->load->view('templates/v_detil_peg', $data);
			$this->load->view('templates/v_footer');
		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

				}

	}

}
