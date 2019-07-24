<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"><?php echo $namasatker; ?> :</h2>

                    <?php
                    //form untuk mencetak rekap absensi
                    echo form_open('Ctrl_Rekap_Absen');
                    ?>
                    <input type="hidden" name="satker" value="<?php echo $namasatker; ?>" />
                    <label>Dari &nbsp</label><input type="date" name="dari" value="<?php echo date('Y-m-d'); ?>">
                    <label>Sampai tanggal &nbsp</label><input type="date" name="sampai" value="<?php echo date('Y-m-d'); ?>">
                    <input type="submit" name="search_submit1" value="Cetak Rekap" class="btn btn-primary btn-sm">
                    </p>
                    <?php echo form_close() ?>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-default">
                        <div class="panel-heading">
                            Data pegawai <?php echo $namasatker; ?>
							<ul class="nav navbar-top-links navbar-right">
							<a href ="<?php echo base_url() ?>index.php/Ctrl_Beranda"><i><<</i> Back</a>
							</ul>
                        </div>
                        <!-- /.panel-heading -->

                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
              <table border width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>Nama</th>
                    <th>NIP</th>
										<th>Jabatan</th>
										<th>lihat absen</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($struktural as $struktural){ ?>
									<tr class="odd gradeX">
									<?php echo form_open('Ctrl_DetailPegawai'); ?>
                                        <td><?php echo $struktural->NM_PEG; ?></td>
										<td><?php echo $struktural->NIP; ?></td>

                    <?php
                      $nama_jabatan = $struktural->NM_JABATAN;
                      if($nama_jabatan=="Sekretaris") {
                        echo "<td>";
                        echo $nama_jabatan." ".$struktural->NM_UNIT_ORG;
                        echo "</td>";
                      } else {
                        echo "<td>Kepala ".$struktural->NM_UNIT_ORG;
                        echo "</td>";
                      }
                    ?>
										<input type="hidden" name="unit_org" value="<?php echo $struktural->NM_UNIT_ORG; ?>" />
										<input type="hidden" name="nip" value="<?php echo $struktural->NIP; ?>" />
										<input type="hidden" name="satker" value="<?php echo $namasatker; ?>" />
										<td><input type="submit" name="search_submit1" value="Pilih" class="btn btn-success"></td>
									<?php echo form_close() ?>
									</tr>
                                <?php } ?>
								<?php foreach($fungsional as $fungsional){ ?>
									<tr class="odd gradeX">
									<?php echo form_open('Ctrl_DetailPegawai'); ?>
                                        <td><?php echo $fungsional->NM_PEG; ?></td>
										<td><?php echo $fungsional->NIP; ?></td>
										<td><?php echo $fungsional->NM_JABATAN; ?></td>
										<input type="hidden" name="unit_org" value="<?php echo $fungsional->NM_UNIT_ES4; ?>" />
										<input type="hidden" name="nip" value="<?php echo $fungsional->NIP; ?>" />
										<input type="hidden" name="satker" value="<?php echo $namasatker; ?>" />
										<td><input type="submit" name="search_submit2" value="Pilih" class="btn btn-success"></td>
									<?php echo form_close() ?>
									</tr>
                                <?php } ?>

								<?php foreach($struktural_UPT_Ess3 as $struktural){ ?>
									<tr class="odd gradeX">
									<?php echo form_open('Ctrl_DetailPegawai'); ?>
                                        <td><?php echo $struktural->NM_PEG; ?></td>
										<td><?php echo $struktural->NIP; ?></td>
										<td><?php echo "Kepala ".$struktural->NM_UNIT_ORG; ?></td>
										<input type="hidden" name="unit_org" value="<?php echo $struktural->NM_UNIT_ORG; ?>" />
										<input type="hidden" name="nip" value="<?php echo $struktural->NIP; ?>" />
										<input type="hidden" name="satker" value="<?php echo $namasatker; ?>" />
										<td><input type="submit" name="search_submit3" value="Pilih" class="btn btn-success"></td>
									<?php echo form_close() ?>
									</tr>
                                <?php } ?>
								<?php foreach($fungsional_UPT_Ess3 as $fungsional){ ?>
									<tr class="odd gradeX">
									<?php echo form_open('Ctrl_DetailPegawai'); ?>
                                        <td><?php echo $fungsional->NM_PEG; ?></td>
										<td><?php echo $fungsional->NIP; ?></td>
										<td><?php echo $fungsional->NM_JABATAN; ?></td>
										<input type="hidden" name="unit_org" value="<?php echo $fungsional->NM_UNIT_ES4; ?>" />
										<input type="hidden" name="nip" value="<?php echo $fungsional->NIP; ?>" />
										<input type="hidden" name="satker" value="<?php echo $namasatker; ?>" />
										<td><input type="submit" name="search_submit4" value="Pilih" class="btn btn-success"></td>
									<?php echo form_close() ?>
									</tr>
                                <?php } ?>

								<?php foreach($struktural_UPT_Ess4 as $struktural){ ?>
									<tr class="odd gradeX">
									<?php echo form_open('Ctrl_DetailPegawai'); ?>
                                        <td><?php echo $struktural->NM_PEG; ?></td>
										<td><?php echo $struktural->NIP; ?></td>
										<td><?php echo "Kepala ".$struktural->NM_UNIT_ORG; ?></td>
										<input type="hidden" name="unit_org" value="<?php echo $struktural->NM_UNIT_ORG; ?>" />
										<input type="hidden" name="nip" value="<?php echo $struktural->NIP; ?>" />
										<input type="hidden" name="satker" value="<?php echo $namasatker; ?>" />
										<td><input type="submit" name="search_submit5" value="Pilih" class="btn btn-success"></td>
									<?php echo form_close() ?>
									</tr>
                                <?php } ?>
								<?php foreach($fungsional_UPT_Ess4 as $fungsional){ ?>
									<tr class="odd gradeX">
									<?php echo form_open('Ctrl_DetailPegawai'); ?>
                                        <td><?php echo $fungsional->NM_PEG; ?></td>
										<td><?php echo $fungsional->NIP; ?></td>
										<td><?php echo $fungsional->NM_JABATAN; ?></td>
										<input type="hidden" name="unit_org" value="<?php echo $fungsional->NM_UNIT_ES4; ?>" />
										<input type="hidden" name="nip" value="<?php echo $fungsional->NIP; ?>" />
										<input type="hidden" name="satker" value="<?php echo $namasatker; ?>" />
										<td><input type="submit" name="search_submit6" value="Pilih" class="btn btn-success"></td>
									<?php echo form_close() ?>
									</tr>
                                <?php } ?>
								</tbody>
                            </table>
							<!-- /.table-responsive -->

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
