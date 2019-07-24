<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
    //fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user_id');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $db2 = $this->load->database('2nd_db', TRUE);
        $db2->select('*');
        $db2->from($table);
        $db2->where($field1);
        $db2->where($field2);
        $db2->limit(1);
        $query = $db2->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    //fungsi check password lama
    public function cek_old()
    {
        $old = md5($this->input->post('old'));
        $db2 = $this->load->database('2nd_db', TRUE);
        $db2->where('password',$old);
        $query = $db2->get('tbl_users');
        return $query->result();
    }

    public function save()
    {
          $pass = md5($this->input->post('new'));
          $data = array ('password' => $pass);
          $db2 = $this->load->database('2nd_db', TRUE);
          $db2->where('id_user', $this->session->userdata('user_id'));
          $db2->update('tbl_users', $data);
    }
}
