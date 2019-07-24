<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin');
    }

	public function index()
	{

			if($this->admin->logged_id())
			{
				//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
				redirect("pages/c_beranda");

			}else{

				//jika session belum terdaftar

				//set form validation
	            $this->form_validation->set_rules('username', 'Username', 'required');
	            $this->form_validation->set_rules('password', 'Password', 'required');

	            //set message form validation
	            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
	                <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

	            //cek validasi
				if ($this->form_validation->run() == TRUE) {

				//get data dari FORM
	            $username = $this->input->post("username", TRUE);
	            $password = MD5($this->input->post('password', TRUE));

	            //checking data via model
	            $checking = $this->admin->check_login('tbl_users', array('username' => $username), array('password' => $password));

	            //jika ditemukan, maka create session
	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {

	                    $session_data = array(
	                        'user_id'   => $apps->id_user,
	                        'user_name' => $apps->username,
	                        'user_pass' => $apps->password,
	                        'user_nama' => $apps->nama_user
	                    );
	                    //set session userdata
	                    $ip_addres = $this->input->ip_address();
	                    helper_log("login", "login", $session_data['user_name'], $ip_addres);
	                    $this->session->set_userdata($session_data);
	                    redirect('pages/c_beranda/');
	                }
	            }else{

	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
	            	$this->load->view('login', $data);
	            }

	        }else{

	            $this->load->view('login');
	        }

		}

	}

	public function setting()
	{
		$this->load->view('templates/v_header');
		$this->load->view('v_ganti_pass');
		$this->load->view('templates/v_footer');
	}

	public function save_password()
	{
		$this->form_validation->set_rules('new','New','required|alpha_numeric');
  		$this->form_validation->set_rules('re-new', 'Retype New', 'required|matches[new]');
  		if($this->form_validation->run() == FALSE)
  		  {
  		  	echo "password tidak cocok";
  		  }
  		  else{
  		  	$cek_old = $this->admin->cek_old();
  		  	 if ($cek_old == False)
  		  	 	{  ?>
  		  	 		<div class="alert">
						<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span><p align="right">Password lama tidak sesuai..!</p>
					</div>
					<?php
					$this->load->view('templates/v_header');
					$this->load->view('v_ganti_pass');
					$this->load->view('templates/v_footer');
  		  	 	}	
  		  	 else{
  		  	 		$ip_addres = $this->input->ip_address();
					$username = $this->session->userdata("user_name");
  		  	 		helper_log("gantipassword", "ganti password", $username, $ip_addres);
  		  	 		$this->admin->save();
  		  	 		$this->session->sess_destroy();
  		  	 		$this->session->set_flashdata('error','Password anda berhasil diubah, silahkan login ulang !' );
					$this->setting();
  		  	 	}
  		  }
	}
}
