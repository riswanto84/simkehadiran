<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_log extends CI_Model {
 
    public function save_log($param)
    {
    	$db2 		= $this->load->database('2nd_db', TRUE);
        $sql        = $db2->insert_string('tabel_log',$param);
        $ex         = $db2->query($sql);
        return $db2->affected_rows($sql);
    }
}