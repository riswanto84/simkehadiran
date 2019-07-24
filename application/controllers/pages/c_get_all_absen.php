<?php

class c_get_all_absen extends CI_Controller{

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

    if($this->admin->logged_id())
		{
		    $this->load->view('templates/v_header');
		    $this->load->view('templates/v_all_absen_peg', $data);
		    $this->load->view('templates/v_footer');
      }else{
      //jika session belum terdaftar, maka redirect ke halaman login
      redirect("login");
      }

	}//end function

}
