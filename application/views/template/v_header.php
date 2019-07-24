<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SI ABSENSI Beta Version 1.1 - Kementerian Sosial</title>
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
                <a class="navbar-brand" href="<?php echo base_url() ?>Ctrl_Beranda">SISTEM INFORMASI ABSENSI</a>
				<a class="navbar-brand" href="www.kemsos.go.id"><img src=https://simpeg.kemsos.go.id/i/logo_aplikasi/logo.png style="height:140%;padding-top:3px;margin-left: 0px;"></a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a href="<?php echo base_url() ?>Ctrl_Beranda">
                        <i class="fa fa-home fa-fw"></i>
                    </a>
				</li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><?php echo $this->session->userdata("user_name") ?><i class="fa fa-user fa-fw"></i></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>/dashboard/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                        <li>
                            <a href="<?php echo base_url(); ?>Ctrl_Beranda"><i class="fa fa-search fa-fw"></i>Cari Data Absensi</a>
							              <a href="<?php echo base_url(); ?>Ctrl_Get_All_IDAbsen"><i class="fa fa-search fa-fw"></i>Semua Pegawai</a>
                        </li>
            </div>
            <!-- /.navbar-static-side -->
        </nav>
