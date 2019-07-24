<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Absensi semua pegawai </h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            cari data :
							<ul class="nav navbar-top-links navbar-right">
							<a href ="<?php echo base_url() ?>index.php/Ctrl_Beranda"><i><<</i> Back</a>
							</ul>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIP</th>
										<th>ID Absensi Mesin FP</th>
										<th>Bridging No</th>
										<th>Pangkat/Gol</th>
										<th>lihat absen</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($id_absen as $id_absen){ ?>
									<tr class="odd gradeX">
									<?php echo form_open('Ctrl_DetailPegawai'); ?>
                                        <td><?php echo $id_absen->NM_PEG; ?></td>
										<td><?php echo $id_absen->NIP; ?></td>
										<td><?php echo $id_absen->badgenumber; ?></td>
										<td><?php echo $id_absen->userid; ?></td>
										<td><?php echo $id_absen->NM_PANGKAT; ?></td>

										<input type="hidden" name="unit_org" value="<?php echo $id_absen->NM_UNIT_ES1; ?>" />
										<input type="hidden" name="nip" value="<?php echo $id_absen->NIP; ?>" />
										<td><input type="submit" name="search_submit1" value="Pilih" class="btn btn-success"></td>
									<?php echo form_close() ?>
									</tr>
                                <?php } ?>
								</tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
