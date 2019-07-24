<?php

class M_Satker extends CI_Model{
	//FUNGSI MENDAPATKAN NAMA KANTOR PADA DB SIMPEG
	function get_kantor()
	{
		$query = $this->db->query('SELECT ID, NM_UNIT_ORG, JNS_KANTOR, KD_ESELON, KD_UNIT_ORG
				FROM spg_08_unit_organisasi
				WHERE
				JNS_KANTOR = 2
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
					AND id <> 2
				OR JNS_KANTOR = 3
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
					AND id <> 128
				OR JNS_KANTOR = 4
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
					AND id <> 154
				OR JNS_KANTOR = 5
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
					AND id <> 268
				OR JNS_KANTOR = 6
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
					AND id <> 601
				OR JNS_KANTOR = 7
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
					AND id <> 698
				OR JNS_KANTOR = 18
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
					AND id <> 895
				OR
				JNS_KANTOR = 8
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
				OR JNS_KANTOR = 10
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
				OR JNS_KANTOR = 11
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
				OR JNS_KANTOR = 12
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
				OR JNS_KANTOR = 13
					AND KD_UNIT_ES3 = 00
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
					AND id <> 865
					AND id <> 866
					AND id <> 867
				OR JNS_KANTOR = 15
					AND KD_UNIT_ES4 = 00
					AND NM_UNIT_ORG <> ""
				OR JNS_KANTOR = 17
					AND KD_UNIT_ES3 = 00
					AND NM_UNIT_ORG <> ""
					AND id <> 270
					AND id <> 271
					AND id <> 272
					AND id <> 274
					AND id <> 275
					AND id <> 276
					AND id <> 278
					AND id <> 279
					AND id <> 280
					AND id <> 952
					AND id <> 953
					AND id <> 954
					AND id <> 970
					AND id <> 972
					AND id <> 973
					AND id <> 974 ORDER BY KD_UNIT_ORG ASC
				');
		return $query;
	}

	//FUNGSI MENDAPATKAN NAMA-NAMA PEJABAT STRUKTURAL UNIT ESELON 2
	function get_Pjbstruktural($satker)
	{
		$query = $this->db->query('SELECT DISTINCT NIP, NM_PEG, NM_JABATAN, NM_UNIT_ORG
				FROM spg_data_current INNER JOIN spg_08_unit_organisasi
				WHERE
				spg_08_unit_organisasi.KD_UNIT_ORG = spg_data_current.KD_UNIT_ORG
				AND NM_UNIT_ES2 = "'.$satker.'"
				AND STS_PENSIUN = 0
				AND KD_JABATAN_STR <> "" AND ISNULL(KD_JABATAN_FUNG)
				ORDER BY KD_JABATAN_STR ASC');
		return $query;
	}

	//FUNGSI MENDAPATKAN NAMA-NAMA PEGAWAI FUNGSIONAL (STAFF) PADA UNIT ESELON 2
	function get_Pjbfungsional($satker)
	{
		$query = $this->db->query('select NM_PEG, NIP, NM_JABATAN, NM_UNIT_ES4
				from spg_data_current
				WHERE NM_UNIT_ES2 = "'.$satker.'"
				AND
				STS_PENSIUN = 0
				AND
				KD_JABATAN_FUNG <> ""
				ORDER BY KD_PANGKAT DESC');
		return $query;
	}

	//FUNGSI MENDAPATKAN NAMA-NAMA PEJABAT STRUKTURAL UPT LEVEL ESELON 3
	function get_Pjbstruktural_UPT_Ess3($satker)
	{
		$query = $this->db->query('SELECT DISTINCT NIP, NM_PEG, NM_JABATAN, NM_UNIT_ORG
				FROM spg_data_current INNER JOIN spg_08_unit_organisasi
				WHERE
				spg_08_unit_organisasi.KD_UNIT_ORG = spg_data_current.KD_UNIT_ORG
				AND NM_KANTOR = "'.$satker.'"
				AND STS_PENSIUN = 0
				AND KD_JABATAN_STR <> "" AND ISNULL(KD_JABATAN_FUNG)
				ORDER BY KD_JABATAN_STR ASC');
		return $query;
	}

	//FUNGSI MENDAPATKAN NAMA-NAMA PEGAWAI FUNGSIONAL (STAFF) PADA UPT ESELON 3
	function get_Pjbfungsional_UPT_Ess3($satker)
	{
		$query = $this->db->query('select NM_PEG, NIP, NM_JABATAN, NM_UNIT_ES4, NM_UNIT_ES3
				from spg_data_current
				WHERE NM_KANTOR = "'.$satker.'"
				AND
				STS_PENSIUN = 0
				AND
				KD_JABATAN_FUNG <> ""
				ORDER BY KD_PANGKAT DESC');
		return $query;
	}

	//FUNGSI MENDAPATKAN NAMA-NAMA PEJABAT STRUKTURAL UPT LEVEL ESELON 4
	function get_Pjbstruktural_UPT_Ess4($satker)
	{
		$query = $this->db->query('SELECT NM_PEG, NIP, NM_JABATAN, NM_UNIT_ES4 AS NM_UNIT_ORG
				FROM spg_data_current WHERE
				NM_KANTOR = "'.$satker.'"
				AND NM_UNIT_ES2 <> "'.$satker.'"
				AND NM_UNIT_ES3 <> "'.$satker.'"
				AND NM_UNIT_ES4 <> "'.$satker.'"
				AND KD_JABATAN_STR <> "" AND STS_PENSIUN = 0
				ORDER BY KD_JABATAN_STR ASC');
		return $query;
	}

	//FUNGSI MENDAPATKAN NAMA-NAMA PEGAWAI FUNGSIONAL (STAFF) PADA UPT ESELON 4
	function get_Pjbfungsional_UPT_Ess4($satker){
		$query = $this->db->query('select NM_PEG, NIP, NM_JABATAN, NM_UNIT_ES4, NM_UNIT_ES3, NM_UNIT_ES2
				from spg_data_current
				WHERE NM_KANTOR = "'.$satker.'"
				AND
				NM_UNIT_ES2 <> "'.$satker.'"
				AND
				NM_UNIT_ES3 <> "'.$satker.'"
				AND
				NM_UNIT_ES4 <> "'.$satker.'"
				AND
				STS_PENSIUN = 0
				AND
				KD_JABATAN_FUNG <> ""
				ORDER BY KD_PANGKAT DESC');
		return $query;
	}

}
