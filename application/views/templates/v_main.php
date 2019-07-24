<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Dashboard</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                              <?php
                              foreach ($jumlah_pegawai as $jumlah_pegawai) {
                                echo number_format(($jumlah_pegawai->jum_pegawai));
                              } ?>
                            </div>
                            <div>Total Pegawai</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() ?>pages/c_data_peg" target="_blank">
                    <div class="panel-footer">
                        <span class="pull-left">Lihat Detail</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-registered fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                            <?php
                                foreach ($jum_data_reg as $jum_data_reg) {
                                  echo number_format($jum_data_reg->jum_peg_reg_fp);
                                }
                            ?>
                            </div>
                            <div>Teregistrasi Fingerprint</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() ?>pages/c_data_peg_register" target="_blank">
                    <div class="panel-footer">
                        <span class="pull-left">Lihat Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-male fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                              <?php
                                  echo number_format($peg_not_reg);
                               ?>
                            </div>
                            <div>Belum Registrasi FP</div>
                        </div>
                    </div>
                </div>
                  <a href="<?php echo base_url() ?>pages/c_not_reg_peg" target="_blank">
                    <div class="panel-footer">
                        <span class="pull-left">Lihat Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Pegawai hadir hari ini -->
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list-ol fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                 <?php echo number_format($jum_peg_absen) ?>
                            </div>
                            <div>Pegawai Hadir</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() ?>pages/c_peg_hadir_now" target="_blank">
                    <div class="panel-footer">
                        <span class="pull-left">Lihat Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!-- / Pegawai hadir hari ini -->
    </div>
    <!-- /.row -->
    
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-pie-chart fa-fw"></i> Kehadiran pegawai hari ini : 
                    <?php 
                    date_default_timezone_set('Asia/Jakarta');
                    echo " ".date('d-m-Y H:i')." WIB"; ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                <!-- disini nanti grafiknya -->
                    <div class="flot-chart">
                        <canvas id="jlhPegawai"/>
                        <script>
                            var config = {
                                    type: 'pie',
                                    data: {
                                        datasets: [{
                                            data: [
                                                    <?php echo round($persen_hadir, 2) ?>, 
                                                    <?php echo round($persen_tdk_hadir, 2) ?>,
                                            ],
                                            backgroundColor: [  
                                                window.chartColors.blue,
                                                window.chartColors.red,
                                            ],  
                                        }],
                                        labels: [
                                            "Hadir <?php echo number_format($jum_peg_absen)." pegawai (".round($persen_hadir, 2) ?> %)",
                                            "Tidak Hadir <?php echo number_format($jum_peg_tdk_absen)." pegawai (".round($persen_tdk_hadir, 2) ?> %)",
                                        ]
                                    },
                                    options: {
                                        plugins: {
                                        datalabels: {
                                            borderColor: 'white',
                                            borderRadius: 25,
                                            borderWidth: 2,
                                            color: 'white',
                                            font: {
                                                weight: 'bold'
                                                },
                                            }
                                        },                              
                                        legend: {
                                            position: 'right',
                                        },
                                        title: {
                                            display: true,
                                            text: 'Grafik Kehadiran'
                                        },
                                        animation: {
                                            animateScale: true,
                                            animateRotate: true
                                        },
                                    }
                            };
                            var grafikPegawai = document.getElementById("jlhPegawai").getContext("2d");
                            window.myPie = new Chart(grafikPegawai, config);
                        </script>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Notifikasi
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <a href="<?php echo base_url() ?>pages/c_under_cons" class="list-group-item" target="_blank">
                        <i class="fa fa-user fa-fw"></i> Pegawai tidak hadir
                        <span class="pull-right text-muted small">
                            <em>
                            <?php
                                echo number_format($jum_peg_tdk_absen);
                            ?>
                            </em>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Mesin Fingerprint :
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table  table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alias/SN</th>
                                        <th>Status</th>
                                        <th>Last Activity</th>
                                        <th>FW Version</th>
                                        <th>Jumlah User</th>
                                        <th>Jumlah Jari</th>
                                        <th>Transaksi</th>
                                        <th>Maks. Transaksi</th>
                                        <th>Tipe</th>
                                        <th>FP Version</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($mesin_finger as $mesin_finger) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $no; ?></td>
                                        <td>
                                        <img src = "<?php echo base_url() ?>assets/image/fp.png" height="42" width="42"> <p>
                                        <?php echo $mesin_finger->alias." (".$mesin_finger->SN.")"; ?>
                                        </p></td>
                                        <?php 
                                            $wkt_skr = $mesin_finger->waktu_sekarang;
                                            $wkt_mesin = $mesin_finger->waktu_mesin;
                                            $selisih = $wkt_skr - $wkt_mesin;
                                            if ($selisih == 0) {
                                                echo "<td><p class='text-primary'>Online</p></td>";
                                            } else {
                                                echo "<td><p class='text-danger'>Offline</p></td>";
                                            }
                                        ?>
                                        <td>
                                            <?php
                                                echo format_indo($mesin_finger->LastActivity)." ";
                                                echo date('H:i:s', strtotime($mesin_finger->LastActivity)); 
                                            ?>
                                        </td>
                                        <td><?php echo $mesin_finger->FWVersion; ?></td>
                                        <td><?php echo number_format($mesin_finger->UserCount); ?></td>
                                        <td><?php echo number_format($mesin_finger->FPCount); ?></td>
                                        <td><?php echo number_format($mesin_finger->TransactionCount); ?></td>
                                        <td><?php echo number_format($mesin_finger->maks_transaksi); ?></td>
                                        <td><?php echo $mesin_finger->DeviceName." "; 
                                            echo $mesin_finger->OEMVendor; ?></td>
                                        <td><?php echo $mesin_finger->FPVersion; ?></td>
                                    </tr>
                                <?php $no++; } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <p class="text-center">
                                <small>Copyright © 2019 | 
                                    <a href = "mailto: riswanto@kemsos.go.id">Riswanto</a>
                                </small>
                                </p>
                            </div>
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
