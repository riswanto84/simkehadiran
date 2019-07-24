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

class c_input_nip extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model admin
      	$this->load->model('admin');
      	$this->load->model('M_Pegawai');
      	$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->admin->logged_id())
    	{	
    		$data['jumlah_row'] = 0;
    		$data['pesan'] = "Tidak ada data";
    		$this->load->view('templates/v_header');
      		$this->load->view('templates/v_input_nip', $data);
      		$this->load->view('templates/v_footer');
    	}else{
      	//jika session belum terdaftar, maka redirect ke halaman login
      	redirect("login");

    }
	}

	public function cari()
	{
		if($this->admin->logged_id())
    	{	
			$this->form_validation->set_rules('keyword','Keyword','required');
					if($this->form_validation->run() != false)
					{
						$keyword = $this->input->post('keyword');
						$data['pesan'] = "";
						$data['keyword'] = $keyword;
						$data['flag'] = 1;
						$data['hasil'] = $this->M_Pegawai->cari_input_nip($keyword)->result();
						$data['jumlah_row'] = $this->M_Pegawai->hitung_cari_input_nip($keyword);
						$this->load->view('templates/v_header');
						$this->load->view('templates/v_input_nip', $data);
				      	$this->load->view('templates/v_footer');
				      }else {
				?>
							<div class="alert">
							  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
							  <p align="right">Kata kunci pencarian tidak boleh kosong..!</p>
							</div>
 				<?php   $this->index();
				      }
	     }else{
      	//jika session belum terdaftar, maka redirect ke halaman login
      		redirect("login");
      		}
	}

	public function update_nip()
	{
		if($this->admin->logged_id())
    	{	
    		$this->form_validation->set_rules('nama','Nama','required');
    		$this->form_validation->set_rules('nip','Nip','required|exact_length[18]');
	    		if($this->form_validation->run() != false)
				{
			    		$keyword = $this->input->post('keyword');
			    		$userid = $this->input->post('userid');
			    		$nip = $this->input->post('nip');
			    		$name = $this->input->post('nama');
			    		$data['jumlah_row'] = 0;
			    		$this->M_Pegawai->update_nip($userid, $nip, $name);
						$ip_addres = $this->input->ip_address();
						$username = $this->session->userdata("user_name");
						helper_log("updatenip", "update nip pegawai", $username, $ip_addres);
			    		?>
							<div class="alert">
							  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> <p align="right">Data berhasil diupdate...</p>
							</div>
			    		<?php
			    		$data['pesan'] = "Data berhasil diupdate";
						$this->load->view('templates/v_header');
						$this->load->view('templates/v_input_nip', $data);
				      	$this->load->view('templates/v_footer');
				}else{
						?>
							<div class="alert">
							  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
							  <p align="right">Nama & NIP tidak boleh kosong, Format NIP salah..!</p>
							</div>
 				<?php   $this->index();
				}
    	}else{
      	//jika session belum terdaftar, maka redirect ke halaman login
      		redirect("login");
      		}

	}

}

/* End of file c_input_nip.php */
/* Location: ./application/controllers/c_input_nip.php */