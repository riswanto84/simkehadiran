<?php

class Ctrl_ListIDAbsenSatker extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_IDAbsenSatker');
    $this->load->helper('url');
		//load model admin
		$this->load->model('admin');

	}

	public function index(){
		$satker = $this->input->post('satker');
		$data['namasatker'] = $satker;
		$data['id_absen_struktural'] = $this->M_IDAbsenSatker->get_ID_Absen_Pjbstruktural($satker)->result();
		$data['id_absen_fungsional'] = $this->M_IDAbsenSatker->get_ID_Absen_Pjbfungsional($satker)->result();
		$data['id_absen_UPT3'] = $this->M_IDAbsenSatker->get_ID_Absen_UPT3($satker)->result();
		$data['id_absen_UPT4'] = $this->M_IDAbsenSatker->get_ID_Absen_UPT4($satker)->result();

		$this->load->view('template/v_header');
		$this->load->view('v_IDAbsenPeg', $data);
		$this->load->view('template/v_footer');

	}

}
