<?php

class Ctrl_All_AbsenPegawai extends CI_Controller{

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
			$data['unit_org'] = $unit_org;
			$data['namasatker'] = $satker;
			$data['nip'] = $this->M_Pegawai->get_Detil_Pegawai($nip)->result();
			$data['user_absen'] = $this->M_Pegawai->get_User_Absen($nip)->result();
			$this->load->view('template/v_header');
			$this->load->view('v_detilPegawai', $data);
			$this->load->view('template/v_footer');
		}
	}

}
