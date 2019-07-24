<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Update_DB extends CI_Model {

	public function hapus_tbl_peg()
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		return $query = $db2->query('DELETE from spg_data_current');
	}

	public function select_data_peg()
	{
		$query = $this->db->query('SELECT * from spg_data_current');
		return $query;
	}

	public function insert_data_peg($data)
	{
		$db2 = $this->load->database('2nd_db', TRUE);
		$db2->insert('spg_data_current', $data);
	}

}

/* End of file M_update_DB.php */
/* Location: ./application/models/update_DB.php */