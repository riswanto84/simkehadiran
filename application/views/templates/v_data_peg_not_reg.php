<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">Pegawai Belum Teregistrasi Sistem Monitoring Kehadiran</h3>
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
						<th>Unit Eselon 2</th>
						<th>Nama Kantor</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($peg_not_reg as $peg_not_reg) {
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $peg_not_reg->NM_PEG; ?></td>
						<td><?php echo $peg_not_reg->NIP; ?></td>
						<td><?php echo $peg_not_reg->NM_UNIT_ES2; ?></td>
						<td><?php echo $peg_not_reg->NM_KANTOR; ?></td>
					</tr>
				<?php
						$no++;
					} ?>
				</tbody>
			</table>
			</div>
	</div>
</div>
