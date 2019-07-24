<?php

class Ctrl_AbsenPegawai extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_Pegawai');
		$this->load->model('M_Rekap_Absen');
    $this->load->helper('url');

		//load model admin
		$this->load->model('admin');
	}

	public function index(){
			//variabel yang dikirim dari form v_detilPegawai
			$nip = $this->input->post('nip');
			$satker = $this->input->post('satker');
			$dari = $this->input->post('dari');
			$sampai = $this->input->post('sampai');
			$unit_org = $this->input->post('unit_org');
			$id_absen = $this->input->post('id_absen');

			$data['dari'] = $dari;
			$data['sampai'] = $sampai;
			$data['satker'] = $satker;
			$data['unit_org'] = $unit_org;
			$data['absen'] = $this->M_Pegawai->get_Absen_Pegawai($nip, $dari, $sampai)->result();
			$data['pegawai'] = $this->M_Pegawai->get_Detil_Pegawai($nip)->result();
			$data['user_absen'] = $this->M_Pegawai->get_User_Absen($nip)->result();

			//$tgl_absen = $kalender['tgl_kalender'];
			//$data['jam_datang'] = $this->M_Rekap_Absen->get_jam_terkecil($id_absen, $tgl_absen); //query jam datang absen
			//$data['jam_pulang'] = $this->M_Rekap_Absen->get_jam_terbesar($id_absen, $tgl_absen); //query jam pulang absen

			$this->load->view('template/v_header');
			$this->load->view('v_AbsenPegawai', $data);
			$this->load->view('template/v_footer');

	}

}
