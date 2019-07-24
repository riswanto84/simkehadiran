<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_not_reg_peg extends CI_Controller {

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
		$data['peg_not_reg'] = $this->M_IDAbsenSatker->get_not_reg_peg()->result();
		if($this->admin->logged_id()) 
		{
			$this->load->view('templates/v_report_a');
			$this->load->view('templates/v_data_peg_not_reg', $data);
			$this->load->view('templates/v_footer_report_a');
		}
		else{
		    //jika session belum terdaftar, maka redirect ke halaman login
		    redirect("login");		
	}

	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */