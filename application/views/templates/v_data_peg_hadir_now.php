<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">Pegawai Hadir Hari ini (<?php echo date('d-m-Y'); ?>)</h3>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-striped table-hover dataTable js-exportable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>NIP</th>
						<th>Jabatan</th>
						<th>Nama Kantor</th>
						<th>Jam Datang</th>
						<th>Jam Pulang</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($peg_hadir_now as $peg_hadir_now) {
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $peg_hadir_now->NM_PEG; ?></td>
						<td><?php echo $peg_hadir_now->nip; ?></td>
						<td><?php echo $peg_hadir_now->NM_JABATAN; ?></td>
						<td><?php echo $peg_hadir_now->NM_UNIT_ES2." "; ?>
						<?php echo $peg_hadir_now->NM_KANTOR; ?></td>
						
						<?php //menampilkan jam absen
						$CI =& get_instance(); //perintah untuk bisa load model
       					$CI->load->model('M_Rekap_Absen'); //meload model M_Rekap_Absen 
       					$id_absen = $peg_hadir_now->userid; //mendapatkan id absen per pegawai
       					date_default_timezone_set('Asia/Jakarta'); //menentukan waktu zona jakarta
						$tgl_absen = date('Y-m-d'); //mendapatkan tanggal
       					$jam_datang = $this->M_Rekap_Absen->get_jam_terkecil($id_absen, $tgl_absen); //query jam datang
       					foreach ($jam_datang as $jam_datang) { //mencetak jam datang
       						$jam_dtg = $jam_datang['jam_datang'];
       						echo "<td>".$jam_datang['jam_datang']."</td>";
       					}

       					$jam_pulang = $this->M_Rekap_Absen->get_jam_terbesar($id_absen, $tgl_absen); //query jam pulang
       					foreach ($jam_pulang as $jam_pulang) { //mencetak jam pulang
       						$jam_plg = $jam_pulang['jam_pulang'];
       						if($jam_plg == $jam_dtg)  //jika jam datang = jam pulang cetak -
       						{
					          echo "<td align = center> - </td>";
					        } else {
					          		echo "<td align = center>".$jam_pulang['jam_pulang']."</td>";
					      		   }
       					}
       					?>
					</tr>
				<?php
						$no++;
					} ?>
				</tbody>
			</table>
			</div>
	</div>
</div>
