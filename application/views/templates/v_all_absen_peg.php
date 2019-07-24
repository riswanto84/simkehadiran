<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Bridging e-office</h3>
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
							<a href ="<?php echo base_url() ?>pages/c_unit_kerja"><i><<</i> Back</a>
							</ul>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIP</th>
										<th>ID absen</th>
										<th>e-office bridging no</th>
										<th>pangkat/gol</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($id_absen as $id_absen){ ?>
									<tr class="odd gradeX">
									<?php echo form_open('pages/c_detail_peg', array('target' => '_blank')); ?>
                    <td><?php echo $id_absen->NM_PEG; ?></td>
										<td><?php echo $id_absen->NIP; ?></td>
										<td><?php echo $id_absen->badgenumber; ?></td>
										<td><?php echo $id_absen->userid; ?></td>
										<td><?php echo $id_absen->NM_PANGKAT; ?></td>
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
          </div>
          <!-- /#page-wrapper -->
