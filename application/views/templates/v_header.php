<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Monitoring Kehadiran - Kementerian Sosial</title>
      <link rel="shortcut icon" href="https://simpeg.kemsos.go.id/assets/ico/favicon.ico">

    <!-- Pace Preloder progress background-->
    <script src="<?php echo base_url();?>assets/pace/pace.min.js"></script>
    <!-- CSS -->
    <link href="<?php echo base_url();?>assets/pace/preloader.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/SBAdmin/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/SBAdmin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/SBAdmin/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>assets/SBAdmin/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>assets/SBAdmin/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/SBAdmin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/SBAdmin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/SBAdmin/morrisjs/morris.css" rel="stylesheet">


    <script src="<?php echo base_url();?>assets/bootstrap-data/plugins/chartjs/Chart.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap-data/plugins/chartjs/utils.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap-data/plugins/chartjs/chartjs-plugin-datalabels.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>pages/c_beranda">Sistem Informasi Monitoring Kehadiran</a>
                        <a class="navbar-brand" href="www.kemsos.go.id"><img src=https://simpeg.kemsos.go.id/i/logo_aplikasi/logo.png style="height:140%;padding-top:3px;margin-left: 0px;"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?"><i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata("user_name") ?></a>
                        </li>
                        <li><a href="<?php echo base_url() ?>Login/setting"><i class="fa fa-gear fa-fw"></i> Ganti password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url() ?>dashboard/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <?php echo form_open('pages/c_cari_peg') ?>
                            <div class="input-group custom-search-form">
                                <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Search..."
                                onkeypress="return searchKeyPress(event);">
                                <script>
                                function searchKeyPress(e)
                                {
                                    // look for window.event in case event isn't passed in
                                    e = e || window.event;
                                    if (e.keyCode == 13)
                                    {
                                        document.getElementById('btnSearch').click();
                                        return false;
                                    }
                                    return true;
                                }
                                </script>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="btnSearch" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                            <?php echo form_close() ?>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>pages/c_beranda"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>pages/c_get_all_absen"><i class="fa fa-table fa-fw"></i> Bridging e-office</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>pages/c_input_nip"><i class="fa fa-edit fa-fw"></i> Input NIP</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Laporan Absen<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() ?>pages/c_unit_kerja">Unit Kerja</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
