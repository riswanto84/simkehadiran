<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">Data Pegawai Kementerian Sosial</h3>
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
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($data_pegawai as $data_pegawai) {
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data_pegawai->NM_PEG; ?></td>
						<td><?php echo $data_pegawai->NIP; ?></td>
						<td><?php echo $data_pegawai->NM_JABATAN; ?></td>
						<td><?php echo $data_pegawai->NM_KANTOR; ?></td>
					</tr>
				<?php
						$no++;
					} ?>
				</tbody>
			</table>
			</div>
	</div>
</div>
