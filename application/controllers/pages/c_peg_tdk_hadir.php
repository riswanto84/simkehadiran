<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_peg_tdk_hadir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		//load model admin
      	$this->load->model('admin');
      	$this->load->model('M_IDAbsenSatker');
      	$this->load->model('M_Rekap_Absen');
	}	

	public function index()
	{
		 if($this->admin->logged_id())
    	 {	
    	 	$query = $this->M_IDAbsenSatker->get_All_ID_Absen()->result();
    	 	$no=1;
    	 	date_default_timezone_set('Asia/Jakarta');
			$tgl = date('Y-m-d');
			$dari = $tgl;
			$sampai = $tgl;
    	 	foreach ($query as $query) {
    	 		$id_absen = $query->userid;
    	 		$absen = $this->M_Rekap_Absen->get_Absen_Pegawai($nip, $dari, $sampai);
	    	 		foreach ($absen as $absen) 
	    	 		{    	 		
		    	 		echo $no.".  ";
		    	 		
		    	 		$no++;
	    	 		}
    	 	}
    	 }else{
	      //jika session belum terdaftar, maka redirect ke halaman login
	      redirect("login");

		}
	}
}

/* End of file c_peg_tdk_hadir.php */
/* Location: ./application/controllers/c_peg_tdk_hadir.php */