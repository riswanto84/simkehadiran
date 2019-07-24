<?php

class c_data_peg extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Pegawai');
    	$this->load->helper('url');

		//load model admin
		$this->load->model('admin');
	}

	public function index(){
			$data['data_pegawai'] = $this->M_Pegawai->get_data_pegawai()->result();
			if($this->admin->logged_id())
			{
			$this->load->view('templates/v_report_a');
			$this->load->view('templates/v_data_peg', $data);
			$this->load->view('templates/v_footer_report_a');
		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

				}

	}

}
