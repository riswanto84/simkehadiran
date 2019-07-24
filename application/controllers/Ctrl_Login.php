<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ctrl_Login extends CI_Controller {

	function __construct() {
        parent::__construct();
		if(!isset($_SESSION))
		{
        session_start();
		}
		$this->load->model('m_login');

    }

	function index()
	{
		$this->load->view('admin/v_login');
	}

  	function aksi_login() {

    $username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'nama_user' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("tbl_user",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("/Ctrl_Beranda"));

		}else{
			$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
	        redirect();
		}

    }

    function logout() {
        $this->session->sess_destroy();
		redirect(base_url('index.php/Ctrl_Login'));
    }

}
