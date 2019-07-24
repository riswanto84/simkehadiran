<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ctrl_Beranda extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Satker');
		$this->load->helper('url');
		//load library form validasi
		$this->load->library('form_validation');
		//load model admin
		$this->load->model('admin');
	}

	function index(){

			$data['kantor'] = $this->M_Satker->get_kantor()->result();
			$data['jenis_kantor'] = "unit kerja";

		if($this->admin->logged_id())
        {

			$this->load->view('template/v_header');
			$this->load->view('v_beranda', $data);
			$this->load->view('template/v_footer');
		}else{

      //jika session belum terdaftar, maka redirect ke halaman login
      redirect("login");

		}

}
}
