<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_cari_peg extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//load model admin
     	$this->load->model('admin');
     	$this->load->model('M_Pegawai');
	}

	public function index()
	{
		if($this->admin->logged_id())
    	{
	    	$keyword = $this->input->post('keyword');
	    	$data['hasil_cari_peg'] = $this->M_Pegawai->cari_pegawai($keyword);
  			$this->load->view('templates/v_header');
  			$this->load->view('templates/v_pegawai_cari', $data);
  			$this->load->view('templates/v_footer');
    	}else{
	    //jika session belum terdaftar, maka redirect ke halaman login
	    redirect("login");
		}

	}
}

/* End of file c_cari_peg.php */
/* Location: ./application/controllers/c_cari_peg.php */