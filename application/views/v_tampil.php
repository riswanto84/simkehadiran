<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">cari pegawai :</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data pegawai <?php echo $namasatker; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>nama</th>
                                        <th>NIP</th>
										<th>jabatan</th>
										<th>unit organisasi</th>
										<th>lihat absen</th>
                                    </tr>
                                </thead>
                                <tbody>
								
								
								<?php foreach($fungsional_UPT_Ess3 as $fungsional){ ?>  
									<tr class="odd gradeX">
                                        <td><?php echo $fungsional->NM_PEG; ?></td>
										<td><?php echo $fungsional->NIP; ?></td>
										<td><?php echo $fungsional->NM_JABATAN; ?></td>
										<td><?php echo $fungsional->NM_UNIT_ES4; ?></td>
										<td><input type="submit" name="search_submit1" value="Pilih" class="btn btn-success"></td>
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
            