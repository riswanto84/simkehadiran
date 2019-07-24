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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/SBAdmin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="page-wrapper">
    <h3 class="text-center"><?php echo $unit ?> </h3> <p class="text-center"> (
    <?php
      foreach ($jum_pegawai as $jum_peg) {
        echo $jum_peg['total_peg']." pegawai )"; ?>
        <a href="<?php echo base_url() ?>pages/c_unit_kerja"><i class="fa fa-home fa-fw"></i></a>
        <?php
        echo "</p></br></hr>";
      }
    ?>
  </br>
  <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1"></div>
      <div class="col-sm-1">
        <?php echo form_open('pages/c_page/export_excell');?>
        <input type="hidden" name="satker" value="<?php echo $unit; ?>" />
        <input type="hidden" name="dari" value="<?php echo $dari; ?>" />
        <input type="hidden" name="sampai" value="<?php echo $sampai; ?>" />
        <input type="submit" name="search_submit" value="Export Excell" class="btn btn-outline-danger btn-sm">
        <?php echo form_close();?>
      </div>
  </div>
      <div class="col-lg-12">
