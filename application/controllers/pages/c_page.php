<?php

class c_page extends CI_Controller{
  public function __construct(){
		parent::__construct();
    $this->load->helper('url');
    $this->load->model('M_Pegawai');
    $this->load->model('M_Rekap_Absen');
    //load model admin
		$this->load->model('admin');
	}

  function index(){
    if($this->admin->logged_id())
		{
    $satker = $this->input->post('satker');
    echo $satker;
    }else{

    //jika session belum terdaftar, maka redirect ke halaman login
    redirect("login");

      }
  }

  function export_excell(){
    $satker = $this->input->post('satker');
    $dari = $this->input->post('dari'); //mengambi rentang tanggal awal absen
    $sampai = $this->input->post('sampai'); //mengambil rentang tanggal akhir absen

    require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
    require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("siks-absensi.kemsos.net");
    $objPHPExcel->getProperties()->setLastModifiedBy("siks-absensi.kemsos.net");
    $objPHPExcel->getProperties()->setTitle("export absensi pegawai");
    $objPHPExcel->getProperties()->setSubject("");
    $objPHPExcel->getProperties()->setDescription("");

    $objPHPExcel->setActiveSheetIndex(0);

    $data = $this->M_Rekap_Absen->get_NIP($satker);
    $baris1=1;
    $baris2=2;
    $baris3=3;
    $baris4=4;
    $nomor = 0;

    foreach($data as $peg){ //LOOP 1
      $nip = $peg['NIP'];
      $rekap = $this->M_Rekap_Absen->get_rekap($nip);
      $rekap_simpeg = $this->M_Rekap_Absen->get_rekap_simpeg($nip);
      $nomor++;

      //mencetak NIP dan badgenumber absen pegawai
      foreach ($rekap as $data_absen ) { //loop 2
          foreach ($rekap_simpeg as $data_simpeg) { //loop 3
              $objPHPExcel->getActiveSheet()->SetCellValue('A'.$baris1, 'Nama ');
              $objPHPExcel->getActiveSheet()->SetCellValue('B'.$baris1, ' : ');
              $objPHPExcel->getActiveSheet()->SetCellValue('A'.$baris2, 'NIP ');
              $objPHPExcel->getActiveSheet()->SetCellValue('B'.$baris2, ' : ');
              $objPHPExcel->getActiveSheet()->SetCellValue('A'.$baris3, 'No');
              $objPHPExcel->getActiveSheet()->SetCellValue('B'.$baris3, 'Hari');
              $objPHPExcel->getActiveSheet()->SetCellValue('C'.$baris3, 'Tanggal');
              $objPHPExcel->getActiveSheet()->SetCellValue('D'.$baris3, 'Jam Datang');
              $objPHPExcel->getActiveSheet()->SetCellValue('E'.$baris3, 'Jam Pulang');
              $objPHPExcel->getActiveSheet()->SetCellValue('F'.$baris3, 'Keterangan');
              $baris1=$baris1+$baris5;
              $baris2=$baris2+$baris5;
              $baris3=$baris3+$baris5;
              }
              $objPHPExcel->getActiveSheet()->SetCellValue('A'.$baris1, 'Nama ');
              $objPHPExcel->getActiveSheet()->SetCellValue('B'.$baris1, ' : ');
              $objPHPExcel->getActiveSheet()->SetCellValue('A'.$baris2, 'NIP ');
              $objPHPExcel->getActiveSheet()->SetCellValue('B'.$baris2, ' : ');
              $objPHPExcel->getActiveSheet()->SetCellValue('A'.$baris3, 'No');
              $objPHPExcel->getActiveSheet()->SetCellValue('B'.$baris3, 'Hari');
              $objPHPExcel->getActiveSheet()->SetCellValue('C'.$baris3, 'Tanggal');
              $objPHPExcel->getActiveSheet()->SetCellValue('D'.$baris3, 'Jam Datang');
              $objPHPExcel->getActiveSheet()->SetCellValue('E'.$baris3, 'Jam Pulang');
              $objPHPExcel->getActiveSheet()->SetCellValue('F'.$baris3, 'Keterangan');

              $id_absen = $data_absen['userid']; //mengambil user id absen
              $query_absen = $this->M_Rekap_Absen->get_absen($id_absen, $dari, $sampai); //mengambil query get_absen berdasarkan rentang tanggal

              $no=0;
              $baris5=3;
              $query_kalender =  $this->M_Rekap_Absen->get_calendar($id_absen, $dari, $sampai);
              foreach ($query_kalender as $kalender) {
                $no=$no+1;
                $objPHPExcel->getActiveSheet()->SetCellValue('A'.$baris4, $no);
                $objPHPExcel->getActiveSheet()->SetCellValue('B'.$baris4, $kalender['hari']);
                $tgl_absen = $kalender['tgl_kalender'];
                $objPHPExcel->getActiveSheet()->SetCellValue('C'.$baris4, format_indo($kalender['tgl_kalender']));

                //menampilkan jam datang
                $query_jam_dtg =  $this->M_Rekap_Absen->get_jam_terkecil($id_absen, $tgl_absen);
				        $jam_dtg = $jam_datang['jam_datang'];
                foreach ($query_jam_dtg as $jam_datang) {
                  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$baris4, $jam_datang['jam_datang']);
                }
                //menampilkan jam pulang
                $query_jam_plg =  $this->M_Rekap_Absen->get_jam_terbesar($id_absen, $tgl_absen);
                  foreach ($query_jam_plg as $jam_pulang) {
                        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$baris4, $jam_pulang['jam_pulang']);
					}
                $objPHPExcel->getActiveSheet()->SetCellValue('F'.$baris4, $kalender['keterangan']);
                $objPHPExcel->getActiveSheet()->SetCellValue('C'.$baris1, $data_simpeg['NM_PEG']);
                $objPHPExcel->getActiveSheet()->SetCellValue('C'.$baris2, $data_simpeg['NIP']);
                $baris4=$baris4+1;
                $baris5=$baris5+1;
              }
              $baris4=$baris4+3;
      }
    }

    $filename=$satker." - ".date("d-m-Y").'.xlsx';
    $objPHPExcel->getActiveSheet()->SetTitle("Data Absensi Pegawai");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');
    $writer=PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    ob_end_clean();
    $writer->save('php://output');
    exit;
  }
}

?>
