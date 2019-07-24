<?php 

class M_login extends CI_Model{	
	function cek_login($table,$where){
		$this->db2 = $this->load->database('2nd_db', TRUE);
		return $this->db2->get_where($table,$where);
	}	
}