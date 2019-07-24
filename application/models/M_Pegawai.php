<?php

class M_Pegawai extends CI_Model{
	function get_Detil_Pegawai($nip){
		$query = $this->db->query('select * from spg_data_current WHERE NIP = "'.$nip.'" ');
		return $query;
	}

	function get_Absen_Pegawai($nip, $dari, $sampai){
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('select userinfo.userid, userinfo.name, userinfo.nip,checkinout.id,
						checkinout.checktime,
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
						max(time_format((checkinout.checktime), "%H:%i")) as jam_pulang
						from userinfo INNER JOIN checkinout
						ON checkinout.userid = userinfo.userid
						AND userinfo.nip = "'.$nip.'"
						AND checkinout.checktime BETWEEN "'.$dari.' 00:00:00" AND "'.$sampai.' 23:59:00"
						LEFT JOIN iclock on checkinout.SN = iclock.SN
						GROUP BY Tanggal ORDER BY checktime ASC
						');
	}

	function get_User_Absen($nip){
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('SELECT userid, badgenumber, name, nip  FROM userinfo
									WHERE nip = "'.$nip.'"');
	}

	public function get_jumlah_pegawai()
	{
		$query = $this->db->query('SELECT COUNT(NIP) jum_pegawai FROM spg_data_current WHERE STS_PENSIUN = 0');
		return $query;
	}

	public function get_data_pegawai()
	{
		$query = $this->db->query('SELECT * from spg_data_current WHERE STS_PENSIUN = 0 ORDER BY KD_UNIT_ORG ASC');
		return $query;
	}

	public function get_data_pegawai_nip($nip)
	{
		$query = $this->db->query('SELECT spg_data_current.NIP, spg_data_current.NM_PEG, spg_data_current.KD_UNIT_ORG, spg_data_current.NM_PANGKAT,
															spg_08_unit_organisasi.NM_UNIT_ORG, spg_data_current.NM_UNIT_ES2, spg_data_current.NM_UNIT_ES3,
															spg_data_current.NM_UNIT_ES4, spg_data_current.NM_JABATAN, spg_data_current.NM_KANTOR
															FROM spg_data_current join spg_08_unit_organisasi WHERE spg_data_current.STS_PENSIUN = 0
															AND spg_data_current.KD_UNIT_ORG = spg_08_unit_organisasi.KD_UNIT_ORG
															AND spg_data_current.NIP = "'.$nip.'"
															ORDER BY KD_UNIT_ORG ASC');
		return $query;
	}


	public function hitung_peg_teregister()
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		$query = $db2->query('SELECT COUNT(userinfo.nip) as jum_peg_reg_fp from spg_data_current JOIN userinfo WHERE spg_data_current.STS_PENSIUN = 0 AND
			spg_data_current.NIP = userinfo.nip');
		return $query;
	}


	public function get_jum_peg_absen()
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$query = $db2->query('SELECT DISTINCT userinfo.badgenumber, userinfo.nip, 
						spg_data_current.NM_PEG, 
						DATE_FORMAT(checkinout.checktime, "%d %M  %Y") as tanggal
						from userinfo LEFT JOIN checkinout
						ON userinfo.userid = checkinout.userid
						JOIN spg_data_current
						ON userinfo.nip = spg_data_current.NIP
						AND checkinout.checktime > "'.$tgl.' 00:00:00" AND spg_data_current.STS_PENSIUN = 0');
		return $query->num_rows();
	}

	public function get_hadir_hari_ini()
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$query = $db2->query('SELECT DISTINCT userinfo.userid, userinfo.badgenumber, userinfo.nip,
						spg_data_current.NM_JABATAN, spg_data_current.NM_PEG, DATE_FORMAT(checkinout.checktime, "%d %M  %Y") as tanggal,
						spg_data_current.NM_UNIT_ES2, spg_data_current.NM_KANTOR
						from userinfo LEFT JOIN checkinout
						ON userinfo.userid = checkinout.userid
						JOIN spg_data_current
						ON userinfo.nip = spg_data_current.NIP
						AND checkinout.checktime > "'.$tgl.'"
						AND spg_data_current.STS_PENSIUN = 0
						ORDER BY NM_PEG ASC');
		return $query;
	}

	public function cari_pegawai($keyword)
	{
		$this->db->select('*');
			$this->db->from('spg_data_current');
			$this->db->like('NM_PEG',$keyword);
			$this->db->or_like('NIP',$keyword);
			$this->db->having('STS_PENSIUN',  0);
			return $this->db->get()->result();
	}

	public function cari_input_nip($keyword)
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('SELECT * from userinfo WHERE
						defaultdeptid <> 1
						AND	defaultdeptid	<>	2  AND defaultdeptid	<>	3
						AND	defaultdeptid	<>	4  AND defaultdeptid	<>	5
						AND	defaultdeptid	<>	6  AND defaultdeptid	<>	7
						AND	defaultdeptid	<>	8  AND defaultdeptid	<>	9
						AND	defaultdeptid	<>	10 AND	defaultdeptid	<>	11
						AND	defaultdeptid	<>	12 AND	defaultdeptid	<>	13
						AND	defaultdeptid	<>	14 AND	defaultdeptid	<>	15
						AND	defaultdeptid	<>	16 AND	defaultdeptid	<>	17
						AND	defaultdeptid	<>	18 AND	defaultdeptid	<>	19
						AND	defaultdeptid	<>	20 AND	defaultdeptid	<>	21
						AND	defaultdeptid	<>	22 AND	defaultdeptid	<>	23
						AND	defaultdeptid	<>	24 AND	defaultdeptid	<>	25
						AND	defaultdeptid	<>	26 AND	defaultdeptid	<>	27
						AND	defaultdeptid	<>	28 AND	defaultdeptid	<>	29
						AND	defaultdeptid	<>	30 AND	defaultdeptid	<>	31
						AND	defaultdeptid	<>	71 AND	defaultdeptid	<>	72
						AND	defaultdeptid	<>	150 AND	defaultdeptid	<>	151
						AND	defaultdeptid	<>	152 AND	defaultdeptid	<>	153
						AND	defaultdeptid	<>	154 AND	defaultdeptid	<>	155
						AND	defaultdeptid	<>	156 AND	defaultdeptid	<>	157
						AND	defaultdeptid	<>	158 AND	defaultdeptid	<>	159
						AND	defaultdeptid	<>	160 AND	defaultdeptid	<>	161
						AND	defaultdeptid	<>	162 AND	defaultdeptid	<>	163
						AND	defaultdeptid	<>	164 AND	defaultdeptid	<>	165
						AND	defaultdeptid	<>	166 AND	defaultdeptid	<>	1000
						AND NAME like "%'.$keyword.'%" OR NIP like "%'.$keyword.'%"
						OR badgenumber like "%'.$keyword.'%" ');
	}

	public function hitung_cari_input_nip($keyword)
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$query = $db2->query('SELECT * from userinfo WHERE
						defaultdeptid <> 1
						AND	defaultdeptid	<>	2  AND defaultdeptid	<>	3
						AND	defaultdeptid	<>	4  AND defaultdeptid	<>	5
						AND	defaultdeptid	<>	6  AND defaultdeptid	<>	7
						AND	defaultdeptid	<>	8  AND defaultdeptid	<>	9
						AND	defaultdeptid	<>	10 AND	defaultdeptid	<>	11
						AND	defaultdeptid	<>	12 AND	defaultdeptid	<>	13
						AND	defaultdeptid	<>	14 AND	defaultdeptid	<>	15
						AND	defaultdeptid	<>	16 AND	defaultdeptid	<>	17
						AND	defaultdeptid	<>	18 AND	defaultdeptid	<>	19
						AND	defaultdeptid	<>	20 AND	defaultdeptid	<>	21
						AND	defaultdeptid	<>	22 AND	defaultdeptid	<>	23
						AND	defaultdeptid	<>	24 AND	defaultdeptid	<>	25
						AND	defaultdeptid	<>	26 AND	defaultdeptid	<>	27
						AND	defaultdeptid	<>	28 AND	defaultdeptid	<>	29
						AND	defaultdeptid	<>	30 AND	defaultdeptid	<>	31
						AND	defaultdeptid	<>	71 AND	defaultdeptid	<>	72
						AND	defaultdeptid	<>	150 AND	defaultdeptid	<>	151
						AND	defaultdeptid	<>	152 AND	defaultdeptid	<>	153
						AND	defaultdeptid	<>	154 AND	defaultdeptid	<>	155
						AND	defaultdeptid	<>	156 AND	defaultdeptid	<>	157
						AND	defaultdeptid	<>	158 AND	defaultdeptid	<>	159
						AND	defaultdeptid	<>	160 AND	defaultdeptid	<>	161
						AND	defaultdeptid	<>	162 AND	defaultdeptid	<>	163
						AND	defaultdeptid	<>	164 AND	defaultdeptid	<>	165
						AND	defaultdeptid	<>	166 AND	defaultdeptid	<>	1000
						AND NAME like "%'.$keyword.'%" OR NIP like "%'.$keyword.'%"
						OR badgenumber like "%'.$keyword.'%" ');
		return $query->num_rows();
	}

	public function update_nip($userid, $nip, $name)
	{
		$data = array(
        	'nip' => $nip,
        	'name' => $name
		);
		$db2 = $this->load->database('2nd_db', TRUE);
		$db2->WHERE('userid', (int)$userid);
		$db2->update('userinfo', $data);
	}

	public function hasil_update($userid)
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		$query = $db2->query('select * from userinfo WHERE userid = "'.$userid.'" ');
		return $query;
	}

	public function hasil_update_jum_row($userid)
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		$query = $db2->query('select * from userinfo WHERE userid = "'.$userid.'" ');
		return $query->num_rows();
	}

}
