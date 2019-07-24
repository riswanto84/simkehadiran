<?php

class Ctrl_satker extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Satker');
    $this->load->helper('url');

		//load model admin
		$this->load->model('admin');

	}

	public function index(){

		$satker = $this->input->post('satker');
		$data['namasatker'] = $satker;
		$data['struktural'] = $this->M_Satker->get_Pjbstruktural($satker)->result();
		$data['fungsional'] = $this->M_Satker->get_Pjbfungsional($satker)->result();
		$data['struktural_UPT_Ess3'] = $this->M_Satker->get_Pjbstruktural_UPT_Ess3($satker)->result();
		$data['fungsional_UPT_Ess3'] = $this->M_Satker->get_Pjbfungsional_UPT_Ess3($satker)->result();
		$data['struktural_UPT_Ess4'] = $this->M_Satker->get_Pjbstruktural_UPT_Ess4($satker)->result();
		$data['fungsional_UPT_Ess4'] = $this->M_Satker->get_Pjbfungsional_UPT_Ess4($satker)->result();
	
		$this->load->view('template/v_header');
		$this->load->view('v_pegawai', $data);
		$this->load->view('template/v_footer');

        }

	}

