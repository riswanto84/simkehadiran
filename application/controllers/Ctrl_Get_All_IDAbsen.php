<?php

class Ctrl_Get_All_IDAbsen extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_IDAbsenSatker');
    $this->load->helper('url');

		//load model admin
		$this->load->model('admin');
	}

	function index(){
		
		$satker = $this->input->post('satker');
		$data['id_absen'] = $this->M_IDAbsenSatker->get_All_ID_Absen()->result();
		$data['jenis_kantor'] = "unit kerja";
		$this->load->view('template/v_header');
		$this->load->view('v_AllIDAbsenPeg', $data);
		$this->load->view('template/v_footer');


	}//end function

}
