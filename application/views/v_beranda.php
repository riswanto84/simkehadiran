<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Unit Kerja</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pilih Unit Kerja :
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama Kantor</th>
                                        <th>Data Pegawai</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($kantor as $kantor){ ?>
								    <tr class="odd gradeX">

										<?php echo form_open('Ctrl_satker'); ?>
                                        <td>
										<?php echo $kantor->NM_UNIT_ORG; ?>
										<input type="hidden" name="satker" value="<?php echo $kantor->NM_UNIT_ORG; ?>" />
										</td>
                                        <td><input type="submit" name="search_submit" value="Pilih" class="btn btn-primary"></td>
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
