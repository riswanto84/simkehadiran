<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">List ID Absen Pegawai <?php echo $namasatker; ?></h3>
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
							<a href ="<?php echo base_url() ?>index.php/Ctrl_ListIDAbsen"><i><<</i> Back</a>
							</ul>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIP</th>
										<th>ID Absensi Pegawai</th>
										<th>Pangkat/Gol</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($id_absen_struktural as $id_absen){ ?>  
									<tr class="odd gradeX">
                                        <td><?php echo $id_absen->NM_PEG; ?></td>
										<td><?php echo $id_absen->NIP; ?></td>
										<td><?php echo $id_absen->badgenumber; ?></td>
										<td><?php echo $id_absen->NM_PANGKAT; ?></td>
									</tr>
                                <?php } ?>
								<?php foreach($id_absen_fungsional as $id_absen){ ?>  
									<tr class="odd gradeX">
                                        <td><?php echo $id_absen->NM_PEG; ?></td>
										<td><?php echo $id_absen->NIP; ?></td>
										<td><?php echo $id_absen->badgenumber; ?></td>
										<td><?php echo $id_absen->NM_PANGKAT; ?></td>
									</tr>
                                <?php } ?>
								<?php foreach($id_absen_UPT3 as $id_absen){ ?>  
									<tr class="odd gradeX">
                                        <td><?php echo $id_absen->NM_PEG; ?></td>
										<td><?php echo $id_absen->NIP; ?></td>
										<td><?php echo $id_absen->badgenumber; ?></td>
										<td><?php echo $id_absen->NM_PANGKAT; ?></td>
									</tr>
                                <?php } ?><?php foreach($id_absen_UPT4 as $id_absen){ ?>  
									<tr class="odd gradeX">
                                        <td><?php echo $id_absen->NM_PEG; ?></td>
										<td><?php echo $id_absen->NIP; ?></td>
										<td><?php echo $id_absen->badgenumber; ?></td>
										<td><?php echo $id_absen->NM_PANGKAT; ?></td>
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
            