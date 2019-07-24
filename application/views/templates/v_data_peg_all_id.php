<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">Pegawai Teregistrasi Sistem Monitoring Kehadiran</h3>
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
						<th>ID Absen</th>
						<th>Nama Kantor</th>
						<th>Absen</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($all_id_absen as $all_id_absen) {
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $all_id_absen->NM_PEG; ?></td>
						<td><?php echo $all_id_absen->NIP; ?></td>
						<td><?php echo $all_id_absen->badgenumber; ?></td>
						<td><?php echo $all_id_absen->NM_KANTOR; ?></td>
						<?php echo form_open('pages/c_detail_peg'); ?>
						<input type="hidden" name="unit_org" value="<?php echo $all_id_absen->NM_UNIT_ORG; ?>" />
						<input type="hidden" name="nip" value="<?php echo $all_id_absen->NIP; ?>" />
						<td><input type="submit" name="search_submit3" value="Pilih" class="btn btn-success"></td>
						<?php echo form_close() ?>
					</tr>
				<?php
						$no++;
					} ?>
				</tbody>
			</table>
			</div>
	</div>
</div>
