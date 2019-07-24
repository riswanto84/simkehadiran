<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_data_peg_register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_IDAbsenSatker');
    	$this->load->helper('url');

		//load model admin
		$this->load->model('admin');
	}

	public function index()
	{	
		$data['all_id_absen'] = $this->M_IDAbsenSatker->get_All_ID_Absen()->result();
		if($this->admin->logged_id())
			{
				$this->load->view('templates/v_report_a');
				$this->load->view('templates/v_data_peg_all_id', $data);
				$this->load->view('templates/v_footer_report_a');
			}
				else{
	      		//jika session belum terdaftar, maka redirect ke halaman login
	      		redirect("login");
      	}
	}

}

/* End of file c_data_peg_register.php */
/* Location: ./application/controllers/c_data_peg_register.php */