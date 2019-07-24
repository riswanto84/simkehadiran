<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
    }

	public function index()
	{
		if($this->admin->logged_id())
		{

			$this->load->view("/templates/v_header");			

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}

	public function logout()
	{
		$ip_addres = $this->input->ip_address();
      	$username = $this->session->userdata("user_name");
     	helper_log("logout", "log out", $username, $ip_addres);
		$this->session->sess_destroy();
		redirect('login');
	}

}
