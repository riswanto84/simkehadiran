<?php

class Ctrl_Rekap_Absen extends CI_Controller{
  Public function __construct(){
		parent::__construct();
		$this->load->model('M_Rekap_Absen');
    $this->load->model('M_Pegawai');
    $this->load->helper('url');

    //load model admin
		$this->load->model('admin');
	}

  function index(){
      $dari = $this->input->post('dari'); //mengambi rentang tanggal awal absen
      $sampai = $this->input->post('sampai'); //mengambil rentang tanggal akhir absen
      $satker = $this->input->post('satker');
      $data['unit'] = $satker;
      $data['dari'] =$dari;
      $data['sampai'] = $sampai;
      $data['jum_pegawai'] = $this->M_Rekap_Absen->hitung_pegawai($satker);
      $this->load->view('template/v_report', $data);
      $data['satker'] = $satker;
      $rekap_nip = $this->M_Rekap_Absen->get_NIP($satker); //sebelumnnya $data

      $nomor = 1;
      //Mendapatkan NIP pegawai pada satker yang dipilih
      foreach($rekap_nip as $rekap_nip){ //loop 1
        $nip = $rekap_nip['NIP'];
        $data['nama_pegawai'] = $rekap_nip['NM_PEG'];
        $data['nip'] = $rekap_nip['NIP'];
        $data['nomor']=$nomor;

        $rekap = $this->M_Rekap_Absen->get_rekap($nip);
        foreach ($rekap as $data_absen ) { //loop 2
          $data['badgenumber'] = $data_absen['badgenumber'];
          $id_absen = $data_absen['userid'];
          $data['query_kalender'] =  $this->M_Rekap_Absen->get_calendar($id_absen, $dari, $sampai);
          $data['id'] = $id_absen;
          $this->load->view('v_rekap_absen', $data);
        } //loop 2
        $nomor++;
      } //loop 1

    } //end function


    function export_excell(){
      echo "berhasil export";
    }

  }//end controller

?>
