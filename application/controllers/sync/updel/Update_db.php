<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_db extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Update_DB');
	}

	public function index()
	{
		$this->M_Update_DB->hapus_tbl_peg();
		$data = $this->M_Update_DB->select_data_peg()->result();
		$no=1;
		foreach ($data as $data) {
			$data = array( 
		        	'ID'	=>  $data->ID , 
		        	'NIP'	=>  $data->NIP, 
		       		'NM_PEG'=>  $data->NM_PEG,
		       		'PICTURE' => $data->PICTURE,
		       		'THUMB' => $data->THUMB,
		       		'JNS_KELAMIN_PEG' => $data->JNS_KELAMIN_PEG,
		       		'NM_JNS_KELAMIN_PEG' => $data->NM_JNS_KELAMIN_PEG,
		       		'KD_AGAMA' => $data->KD_AGAMA,
		       		'NM_AGAMA' => $data->NM_AGAMA,
		       		'STS_PERKAWINAN' => $data->STS_PERKAWINAN,
		       		'KET_PERKAWINAN' => $data->KET_PERKAWINAN,
		       		'NO_KARTU_PEG' => $data->NO_KARTU_PEG,
		       		'NPWP' => $data->NPWP,
		       		'THN_REOG_UNIT_ORG' => $data->THN_REOG_UNIT_ORG,
		       		'KD_UNIT_ORG' => $data->KD_UNIT_ORG,
		       		'NM_UNIT_ES1' => $data->NM_UNIT_ES1, 
		       		'NM_UNIT_ES2' => $data->NM_UNIT_ES2,
		       		'NM_UNIT_ES3' => $data->NM_UNIT_ES3,
		       		'NM_UNIT_ES4' => $data->NM_UNIT_ES4,
		       		'TMT_PENEMPATAN' => $data->TMT_PENEMPATAN,
		       		'MASA_THN_PENEMPATAN' => $data->MASA_THN_PENEMPATAN,
		       		'MASA_BLN_PENEMPATAN' => $data->MASA_BLN_PENEMPATAN,
		       		'JNS_JABATAN_CUR' => $data->JNS_JABATAN_CUR,
		       		'THN_REOG_JABATAN' => $data->THN_REOG_JABATAN,
		       		'KD_JABATAN_STR' =>$data->KD_JABATAN_STR,
		       		'KD_JABATAN_FUNG' => $data->KD_JABATAN_FUNG,
		       		'NM_JABATAN' => $data->NM_JABATAN,
		       		'TMT_JABATAN' => $data->TMT_JABATAN,
		       		'MASA_THN_JABATAN' => $data->MASA_THN_JABATAN,
		       		'MASA_BLN_JABATAN' => $data->MASA_BLN_JABATAN,
		       		'THN_REOG_PANGKAT' => $data->THN_REOG_PANGKAT,
		       		'KD_PANGKAT' => $data->KD_PANGKAT,
		       		'NM_PANGKAT' => $data->NM_PANGKAT,
		       		'TMT_PANGKAT' => $data->TMT_PANGKAT,
		       		'MASA_THN_PANGKAT' => $data->MASA_THN_PANGKAT,
		       		'MASA_BLN_PANGKAT' => $data->MASA_BLN_PANGKAT,
		       		'KD_STATUS_KEPEG' => $data->KD_STATUS_KEPEG,
		       		'NM_STATUS_KEPEG' => $data->NM_STATUS_KEPEG,
		       		'TMT_STATUS_KEPEG' => $data->TMT_STATUS_KEPEG,
		       		'JNS_UNIT_CUR' => $data->JNS_UNIT_CUR,
		       		'KD_UNIT_LUAR' => $data->KD_UNIT_LUAR,
		       		'NM_UNIT_LUAR' => $data->NM_UNIT_LUAR, 
		       		'THN_REOG_KANTOR' => $data->THN_REOG_KANTOR,
		       		'KD_KANTOR' => $data->KD_KANTOR,
		       		'NM_KANTOR' => $data->NM_KANTOR,
		       		'THN_REOG_ESELON' => $data->THN_REOG_ESELON,
		       		'KD_ESELON' => $data->KD_ESELON,
		       		'NM_ESELON' => $data->NM_ESELON,
		       		'JNS_TMP_TINGGAL' => $data->JNS_TMP_TINGGAL,
		       		'KET_TMP_TINGGAL' => $data->KET_TMP_TINGGAL,
		       		'KD_PROPINSI' => $data->KD_PROPINSI,
		       		'KD_KABUPATEN' => $data->KD_KABUPATEN,
		       		'KD_KECAMATAN' => $data->KD_KECAMATAN,
		       		'KD_KELURAHAN' => $data->KD_KELURAHAN,
		       		'JL_TMP_TINGGAL_CUR' => $data->JL_TMP_TINGGAL_CUR,
		       		'NO_TMP_TINGGAL_CUR' => $data->NO_TMP_TINGGAL_CUR,
		       		'RT_TMP_TINGGAL_CUR' => $data->RT_TMP_TINGGAL_CUR,
		       		'RW_TMP_TINGGAL_CUR' => $data->RW_TMP_TINGGAL_CUR,
		       		'TMT_TMP_TINGGAL' => $data->TMT_TMP_TINGGAL,
		       		'JNS_PEND_FORMAL' => $data->JNS_PEND_FORMAL,
		       		'KET_PEND_FORMAL' => $data->KET_PEND_FORMAL,
		       		'NM_LEMB_PEND_FORMAL' => $data->NM_LEMB_PEND_FORMAL,
		       		'TMP_LEMB_PEND_FORMAL' => $data->TMP_LEMB_PEND_FORMAL,
		       		'kd_pend_umum' => $data->kd_pend_umum,
		       		'NM_PEND_UMUM' => $data->NM_PEND_UMUM,
		       		'TGL_IJAZAH' => $data->TGL_IJAZAH,
		       		'JNS_PEND_DINAS' => $data->JNS_PEND_DINAS,
		       		'NM_PEND_DINAS' => $data->NM_PEND_DINAS,
		       		'LEMB_PEND_DIKLAT' => $data->LEMB_PEND_DIKLAT,
		       		'JML_PEND_DINAS' => $data->JML_PEND_DINAS,
		       		'TGL_MULAI_PEND_DINAS' => $data->TGL_MULAI_PEND_DINAS,
		       		'THN_MASA_KERJA_CUR' => $data->THN_MASA_KERJA_CUR,
		       		'BLN_MASA_KERJA_CUR' => $data->BLN_MASA_KERJA_CUR,
		       		'STS_PENSIUN' => $data->STS_PENSIUN,
		       		'TMT_GAJI' => $data->TMT_GAJI,
		       		'GAPOK_BARU' => $data->GAPOK_BARU,
		       		'NO_SK' => $data->NO_SK,
		       		'LAST_GENERATED' => $data->LAST_GENERATED,
		       		'JNS_KANTOR' => $data->JNS_KANTOR,
		       		'TGL_LAHIR_PEG' => $data->TGL_LAHIR_PEG,
		       		'TEMPAT_LAHIR_PEG' => $data->TEMPAT_LAHIR_PEG,
		       		'kd_jabatan_str1' => $data->kd_jabatan_str1,
		       		'TMT_PENSIUN' => $data->TMT_PENSIUN,
		       		'SK_PENSIUN' => $data->SK_PENSIUN,
		       		'nip_lama' => $data->nip_lama,
		       		'nip_baru' => $data->nip_baru,
		       		'NO_LEMARI' => $data->NO_LEMARI
		       									);
			$this->M_Update_DB->insert_data_peg($data);
		}
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */