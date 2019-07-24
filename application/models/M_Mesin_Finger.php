<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Mesin_Finger extends CI_Model {
	
	function get_mesin()
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('SELECT alias, SN, LastActivity, FWVersion, UserCount,
									FPCount, TransactionCount, MaxFingerCount as maks_transaksi, 
									DeviceName, OEMVendor, FPVersion, TIME(LastActivity) as waktu_mesin,
									CURRENT_TIME as waktu_sekarang, 
									timediff(TIME(LastActivity), CURRENT_TIME()) as selisih
									from iclock WHERE DelTag = 0 ORDER BY LastActivity DESC');
		return $query;
	}

	function get_mesin_offline()
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		$query = $db2->query('SELECT alias, SN from iclock WHERE DATE(LastActivity) <> CURDATE()
							ORDER BY LastActivity DESC');
		return $query->num_rows();
	}
	

}

/* End of file m_Mesin_Finger.php */
/* Location: ./application/models/m_Mesin_Finger.php */