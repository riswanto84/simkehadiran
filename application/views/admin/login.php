<!DOCTYPE html>
<html>
  <head>
    <title>SIKS-ABSENSI Kementerian Sosial</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet" media="screen">
  </head>
  <body id="login">
    <div class="container">
      <form class="form-signin" action="<?php echo base_url('index.php/Ctrl_Login/aksi_login'); ?>" method="post">
        <h2 class="form-signin-heading">SIKS-ABSENSI</h2>
		<div class="alert alert-error">
        	
            <?php echo $this->session->flashdata('result_login'); ?>
        </div>  
        <input type="text" class="input-block-level" name="username" placeholder="Nama User">
        <input type="password" class="input-block-level" name="password" placeholder="Password">
        <button class="btn btn-primary" type="submit">Login</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>