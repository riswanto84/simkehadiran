<?php

class M_Rekap_Absen extends CI_Model{
//ambil data pegawai satker yang dipilih dari SIMPEG
function get_NIP($satker){
  $query = $this->db->query('SELECT ID, NM_PEG, NIP FROM spg_data_current WHERE STS_PENSIUN = 0
    AND NM_UNIT_ES2 = "'.$satker.'" OR NM_UNIT_ES3 = "'.$satker.'" OR NM_KANTOR = "'.$satker.'"
    ORDER BY nm_peg ASC');
  return $query->result_array();
  }

//fungsi mendapatkan ID UKE 2
function get_id_uk2($satker) {
  $query = $this->db->query('SELECT id_uk, unit_kerja FROM mig_tbl_uk2
                            WHERE unit_kerja = "'.$satker.'"');
  return $query->result_array();
}

//fungsi menghitung jumlah pegawai
public function hitung_pegawai($satker){
  $query = $this->db->query('SELECT COUNT(NIP) AS total_peg FROM spg_data_current
                            WHERE NM_UNIT_ES2 = "'.$satker.'" AND STS_PENSIUN = 0
                            OR NM_KANTOR = "'.$satker.'" AND STS_PENSIUN = 0');
  return $query->result_array();
}

//ambil data dengan NIP pada tabel userinfo
function get_rekap($nip){
  $db2 = $this->load->database('2nd_db', TRUE);
  $query = $db2->query('SELECT spg_data_current.NIP, userinfo.badgenumber, userinfo.userid, spg_data_current.STS_PENSIUN
                        FROM userinfo JOIN spg_data_current
                        WHERE spg_data_current.NIP = userinfo.nip
                        AND userinfo.nip = "'.$nip.'" AND spg_data_current.STS_PENSIUN = 0');
  return $query->result_array();
  }

  function get_rekap_simpeg($nip){
    $query = $this->db->query('SELECT * from spg_data_current WHERE NIP = "'.$nip.'" AND STS_PENSIUN = 0');
    return $query->result_array();
  }

  function get_absen($id_absen, $dari, $sampai){
    $db2 = $this->load->database('2nd_db', TRUE);
    $query = $db2->query('select userinfo.userid, userinfo.name, userinfo.nip,checkinout.id,
						CASE
						WHEN DATE_FORMAT(checkinout.checktime, "%w") = 0 then "Minggu"
						WHEN DATE_FORMAT(checkinout.checktime, "%w") = 1 then "Senin"
						WHEN DATE_FORMAT(checkinout.checktime, "%w") = 2 then "Selasa"
						WHEN DATE_FORMAT(checkinout.checktime, "%w") = 3 then "Rabu"
						WHEN DATE_FORMAT(checkinout.checktime, "%w") = 4 then "Kamis"
						WHEN DATE_FORMAT(checkinout.checktime, "%w") = 5 then "Jumat"
						WHEN DATE_FORMAT(checkinout.checktime, "%w") = 6 then "Sabtu"
						END
						as hari,
						DATE_FORMAT(checkinout.checktime, "%d %M  %Y") as tanggal,
						min(time_format((checkinout.checktime), "%H:%i")) as jam_datang,
						min(iclock.Alias) as lokasi_mesin1,
						max(time_format((checkinout.checktime), "%H:%i")) as jam_pulang,
						max(iclock.Alias) as lokasi_mesin2
						from userinfo INNER JOIN checkinout
						ON checkinout.userid = userinfo.userid
						AND userinfo.userid = "'.$id_absen.'"
						AND checktime BETWEEN "'.$dari.' 00:00:00" AND "'.$sampai.' 23:59:00"
						LEFT JOIN iclock on checkinout.SN = iclock.SN
						GROUP BY Tanggal ORDER BY checktime ASC
						');
    return $query->result_array();
    }

    function get_calendar($id_absen, $dari, $sampai){
      $db2 = $this->load->database('2nd_db', TRUE);
      $query = $db2->query('SELECT tgl_id, tanggal as tgl_kalender, keterangan,
        CASE
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 0 then "Minggu"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 1 then "Senin"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 2 then "Selasa"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 3 then "Rabu"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 4 then "Kamis"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 5 then "Jumat"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 6 then "Sabtu"
		      END
		      as hari
        from kalender WHERE tanggal BETWEEN "'.$dari.'" AND "'.$sampai.'"');
      return $query->result_array();
    }

    function get_tanggalan($dari, $sampai){
      $db2 = $this->load->database('2nd_db', TRUE);
      $query = $db2->query('SELECT tgl_id, tanggal as tgl_kalender, keterangan,
        CASE
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 0 then "Minggu"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 1 then "Senin"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 2 then "Selasa"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 3 then "Rabu"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 4 then "Kamis"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 5 then "Jumat"
		      WHEN DATE_FORMAT(kalender.tanggal, "%w") = 6 then "Sabtu"
		      END
		      as hari
        from kalender WHERE tanggal BETWEEN "'.$dari.'" AND "'.$sampai.'"');
      return $query->result_array();
    }

    function get_jam_terkecil($id_absen, $tgl_absen){
      $db2 = $this->load->database('2nd_db', TRUE);
      $query = $db2->query('SELECT checkinout.id, checkinout.userid, checkinout.SN, iclock.Alias,
               min(time_format((checkinout.checktime), "%H:%i")) as jam_datang
               from checkinout JOIN iclock
			   on checkinout.SN =  iclock.SN
			   AND userid = "'.$id_absen.'"
               AND checkinout.checktime BETWEEN "'.$tgl_absen.' 00:00:00" AND "'.$tgl_absen.' 23:59:00"');
      return $query->result_array();
    }

    function get_jam_terbesar($id_absen, $tgl_absen){
      $db2 = $this->load->database('2nd_db', TRUE);
      $query = $db2->query('SELECT checkinout.id, checkinout.userid, checkinout.SN, iclock.Alias,
               max(time_format((checkinout.checktime), "%H:%i")) as jam_pulang
               from checkinout JOIN iclock
			   on checkinout.SN =  iclock.SN
			   AND userid = "'.$id_absen.'"
               AND checkinout.checktime BETWEEN "'.$tgl_absen.' 00:00:00" AND "'.$tgl_absen.' 23:59:00"');
      return $query->result_array();
    }
}
?>
