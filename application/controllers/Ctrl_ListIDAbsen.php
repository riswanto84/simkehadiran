<?php

class Ctrl_ListIDAbsen extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Satker');
  	$this->load->helper('url');
		//load model admin
		$this->load->model('admin');
	}

	function index(){
		$data['kantor'] = $this->M_Satker->get_kantor()->result();
		$data['jenis_kantor'] = "unit kerja";
		$this->load->view('template/v_header');
		$this->load->view('v_ListIDAbsen', $data);
		$this->load->view('template/v_footer');
	}

}
