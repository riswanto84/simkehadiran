<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_peg_hadir_now extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		 //load model admin
	      $this->load->model('admin');
	       $this->load->model('M_Rekap_Absen');
	      $this->load->model('M_Pegawai');
  	}
	

	public function index()
	{
		$data['peg_hadir_now'] = $this->M_Pegawai->get_hadir_hari_ini()->result();
		if($this->admin->logged_id())
		{
			$this->load->view('templates/v_report_a');
			$this->load->view('templates/v_data_peg_hadir_now', $data);
			$this->load->view('templates/v_footer_report_a');
		}else{
      //jika session belum terdaftar, maka redirect ke halaman login
      redirect("login");
	}

}
}

/* End of file c_peg_hadir_now.php */
/* Location: ./application/controllers/c_peg_hadir_now.php */