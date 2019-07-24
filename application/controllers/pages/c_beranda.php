<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_beranda extends CI_Controller{
  public function __construct()
  {
      parent::__construct();
      //load model admin
      $this->load->model('admin');

      $this->load->model('M_Pegawai');
      $this->load->model('M_IDAbsenSatker');
      $this->load->model('M_Mesin_Finger');
  }

  function index()
  {
    $data['jumlah_pegawai'] = $this->M_Pegawai->get_jumlah_pegawai()->result();
    $jp = $this->M_Pegawai->get_jumlah_pegawai()->result();
    $data['jum_data_reg'] = $this->M_Pegawai->hitung_peg_teregister()->result();
    $jum_peg = $this->M_Pegawai->get_jumlah_pegawai()->result();
    $peg_reg = $this->M_Pegawai->hitung_peg_teregister()->result();
    foreach ($jum_peg as $jum_peg ) {
      $jum_peg_ = $jum_peg->jum_pegawai;
    }
    foreach ($peg_reg as $peg_reg) {
      $peg_reg_ = $peg_reg->jum_peg_reg_fp;
    }
      $data['peg_not_reg'] = $jum_peg_ - $peg_reg_ ;

    if($this->admin->logged_id())
    {
      $data['jum_peg_absen'] = $this->M_Pegawai->get_jum_peg_absen();
      $absen = $this->M_Pegawai->get_jum_peg_absen();
      $data['jum_peg_tdk_absen'] = $peg_reg_ - $absen;
      $peg_tdk_absen = $peg_reg_ - $absen;
      $data['persen_hadir'] = ($absen/$peg_reg_) * 100;
      $data['persen_tdk_hadir'] = ($peg_tdk_absen/$peg_reg_) * 100;
      $data['mesin_finger'] = $this->M_Mesin_Finger->get_mesin()->result();
      $data['jum_mesin_offline'] = $this->M_Mesin_Finger->get_mesin_offline();

      $this->load->view('templates/v_header');
      $this->load->view('templates/v_main', $data);
      $this->load->view('templates/v_footer');
	  ?>
		<script type="text/javascript">
			function autoRefreshPage()
			{
				window.location = window.location.href;
			}
			setInterval('autoRefreshPage()', 60000);
		</script>
	  <?php
	  

    }else{
      //jika session belum terdaftar, maka redirect ke halaman login
      redirect("login");

    }
  }

}
