<?php

class M_IDAbsenSatker extends CI_Model{
	function get_ID_Absen_Pjbstruktural($satker){
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('SELECT spg_data_current.NIP,
				spg_data_current.NM_PEG, spg_data_current.NM_PANGKAT,
				spg_data_current.NM_UNIT_ES2,spg_data_current.KD_JABATAN_STR,
				userinfo.badgenumber
				FROM
				spg_data_current, userinfo
				WHERE
				spg_data_current.NM_UNIT_ES2 = "'.$satker.'"
				AND spg_data_current.NIP = userinfo.nip
				AND spg_data_current.kd_jabatan_str <> ""
				AND spg_data_current.STS_PENSIUN = 0
				ORDER BY KD_JABATAN_STR ASC');
		return $query;
	}

	function get_ID_Absen_Pjbfungsional($satker){
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('SELECT spg_data_current.NIP,
				spg_data_current.NM_PEG, spg_data_current.NM_PANGKAT,
				spg_data_current.NM_UNIT_ES2, spg_data_current.KD_PANGKAT,
				userinfo.badgenumber
				FROM
				spg_data_current, userinfo
				WHERE spg_data_current.NM_UNIT_ES2 = "'.$satker.'"
				AND spg_data_current.NIP = userinfo.nip
				AND spg_data_current.KD_JABATAN_FUNG <> ""
				AND spg_data_current.STS_PENSIUN = 0
				ORDER BY KD_PANGKAT DESC');
		return $query;
	}

	function get_ID_Absen_UPT3($satker){
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('SELECT spg_data_current.NIP,
				spg_data_current.NM_PEG, spg_data_current.NM_PANGKAT, spg_data_current.KD_PANGKAT,
				spg_data_current.NM_UNIT_ES3,spg_data_current.KD_JABATAN_STR,
				userinfo.badgenumber
				FROM
				spg_data_current, userinfo
				WHERE
				spg_data_current.NM_UNIT_ES3 = "'.$satker.'"
				AND spg_data_current.NIP = userinfo.nip
				AND spg_data_current.STS_PENSIUN = 0
				ORDER BY KD_PANGKAT DESC');
		return $query;
	}

	function get_ID_Absen_UPT4($satker){
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('SELECT spg_data_current.NIP,
				spg_data_current.NM_PEG, spg_data_current.NM_PANGKAT, spg_data_current.KD_PANGKAT,
				spg_data_current.NM_UNIT_ES4,spg_data_current.KD_JABATAN_STR,
				userinfo.badgenumber
				FROM
				spg_data_current, userinfo
				WHERE
				spg_data_current.NM_UNIT_ES4 = "'.$satker.'"
				AND spg_data_current.NIP = userinfo.nip
				AND spg_data_current.STS_PENSIUN = 0
				ORDER BY KD_PANGKAT DESC');
	}

	function get_All_ID_Absen(){
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('SELECT spg_data_current.NIP, spg_data_current.NM_PEG, spg_data_current.NM_PANGKAT,
						spg_data_current.KD_PANGKAT,
						userinfo.badgenumber, userinfo.userid, spg_data_current.NM_UNIT_ES1,
						spg_data_current.NM_UNIT_ES2, spg_data_current.NM_KANTOR, spg_08_unit_organisasi.NM_UNIT_ORG
						FROM spg_data_current
						JOIN userinfo
						ON spg_data_current.NIP = userinfo.nip
						AND spg_data_current.STS_PENSIUN = 0
						LEFT JOIN spg_08_unit_organisasi
						ON spg_data_current.KD_UNIT_ORG = spg_08_unit_organisasi.KD_UNIT_ORG
						ORDER BY KD_PANGKAT DESC');
	}


	function get_not_reg_peg(){
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('SELECT * from spg_data_current LEFT JOIN userinfo
						on spg_data_current.NIP = userinfo.nip
						WHERE spg_data_current.STS_PENSIUN = 0
						AND userinfo.nip IS NULL ORDER BY NM_KANTOR');
	}


}
