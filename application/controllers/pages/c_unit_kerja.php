<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_unit_kerja extends CI_Controller{

	public function __construct()
	{
			parent::__construct();
			//load library form validasi
			$this->load->library('form_validation');
			//load model admin
			$this->load->model('admin');
			//load model satker
			$this->load->model('M_Satker');
	}


	function index()
	{
		$data['kantor'] = $this->M_Satker->get_kantor()->result();
		$data['jenis_kantor'] = "unit kerja";

		if($this->admin->logged_id())
		{
			$this->load->view('templates/v_header');
			$this->load->view('templates/v_unit_kerja', $data);
			$this->load->view('templates/v_footer');
		}else{

      //jika session belum terdaftar, maka redirect ke halaman login
      redirect("login");
		}

	}
}
