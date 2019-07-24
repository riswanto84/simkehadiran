<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Detail Absensi :</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $namasatker ?>
							<ul class="nav navbar-top-links navbar-right">
							</ul>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<?php echo form_open('pages/c_absen_pegawai'); ?>
                                <fieldset disabled>
								<?php foreach($nip as $pegawai){ ?>
                                    <div class="form-group">
                                        <label for="disabledSelect">Nama : </label>
                                        <input class="form-control" id="disabledInput1" type="text" placeholder="<?php echo $pegawai->NM_PEG; ?>" disabled>
                                    </div>
									<div class="form-group">
                                        <label for="disabledSelect">NIP : </label>
                                        <input class="form-control" id="disabledInput1" type="text" placeholder="<?php echo $pegawai->NIP; ?>" disabled>
                                    </div>
									<div class="form-group">
                                        <label for="disabledSelect">Jabatan : </label>
                                        <?php
                                            $nama_jabatan = $pegawai->NM_JABATAN;
                                            $kd_jabstruktural = $pegawai->KD_JABATAN_STR;
                                            $kd_jabfung = $pegawai->KD_JABATAN_FUNG;
                                            if($nama_jabatan=="Sekretaris") {
                                              echo "<input class='form-control' id='disabledInput1' type='text' placeholder='";
                                              echo "Sekretaris ".$unit_org."' disabled>";
                                            }elseif ($kd_jabfung <> "") {
                                              echo "<input class='form-control' id='disabledInput1' type='text' placeholder='";
                                              echo $nama_jabatan."' disabled>";
                                            }else {
                                              echo "<input class='form-control' id='disabledInput1' type='text' placeholder='";
                                              echo "Kepala ".$unit_org."' disabled>";
                                            }
                                        ?>
                                    </div>
									                  <div class="form-group">
                                        <label for="disabledSelect">Pangkat / Golongan : </label>
                                        <input class="form-control" id="disabledInput1" type="text" placeholder="<?php echo $pegawai->NM_PANGKAT; ?>" disabled>
                                    </div><div class="form-group">
                                        <label for="disabledSelect">Unit Kerja : </label>
                                        <input class="form-control" id="disabledInput1" type="text" placeholder="<?php echo $pegawai->NM_UNIT_ES2; ?>" disabled>
                                    </div>
									<?php } ?>

									<?php foreach($user_absen as $user_absen){ ?>
									<div class="form-group">
                                        <label for="disabledSelect">ID Absensi : </label>
                                        <input class="form-control" id="disabledInput1" type="text" placeholder="<?php echo $user_absen->badgenumber; ?>" disabled>
                                    </div>
									<?php } ?>
                                </fieldset>
					<label>Dari &nbsp</label><input type="date" name="dari" value="<?php echo date('Y-m-d'); ?>">
                <label>Sampai tanggal &nbsp</label><input type="date" name="sampai" value="<?php echo date('Y-m-d'); ?>">
								<input type="hidden" name="nip" value="<?php echo $pegawai->NIP; ?>" />
								<input type="hidden" name="satker" value="<?php echo $namasatker ?>" />
                <input type="hidden" name="unit_org" value="<?php echo $unit_org ?>" />
								<input type="submit" class="btn btn-success btn-sm" value="tampilkan absen">
							<?php echo form_close() ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          </div>
        <!-- /#page-wrapper -->
