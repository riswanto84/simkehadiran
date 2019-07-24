<div id="page-wrapper">
  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <?php echo $satker ?>
            <ul class="nav navbar-top-links navbar-right">
            </ul>
          </div>
          <!-- /.panel-heading -->

          <div class="panel-body">
            <?php foreach($pegawai as $pegawai){ ?>
              <fieldset disabled>
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
              <label for="disabledSelect">Unit Kerja : </label>
              <input class="form-control" id="disabledInput1" type="text" placeholder="<?php echo $pegawai->NM_UNIT_ES2; ?>" disabled>
          </div>
          <div class="form-group">
              <label for="disabledSelect">Pangkat / Golongan : </label>
              <input class="form-control" id="disabledInput1" type="text" placeholder="<?php echo $pegawai->NM_PANGKAT; ?>" disabled>
          </div>
        <?php } ?>

      </div>
      </fieldset>

      <div class="panel panel-default">
          <div class="panel-heading">
              Data Absensi :
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">

<?php
$CI =& get_instance();
$CI->load->model('M_Pegawai');
$CI->load->model('M_Rekap_Absen');
     echo "<table border width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>";
      echo "<thead><tr>";
      echo "<th>No</th>";
      echo "<th>Hari</th>";
      echo "<th>Tanggal</th>";
      echo "<th>Jam Datang</th>";
	  echo "<th>Lokasi</th>";
      echo "<th>Jam Pulang</th>";
	  echo "<th>Lokasi</th>";
      echo "<th>Keterangan</th>";
      echo "</tr></thead><tbody>";

  foreach($user_absen as $user){ //loop 1
    $id_absen = $user->userid;
      $no=0;
      $query_kalender =  $this->M_Rekap_Absen->get_tanggalan($dari, $sampai);
      foreach ($query_kalender as $kalender) {//loop 2
        $tgl_absen = $kalender['tgl_kalender'];
        $no++;
        echo "
        <tr class='odd gradeX'>
        <td align='center'>".$no."</td>
        <td align='center'>".$kalender['hari']."</td>
        <td align='center'>".format_indo($kalender['tgl_kalender'])."</td>" ?>
        <?php
          $query_jam_dtg =  $this->M_Rekap_Absen->get_jam_terkecil($id_absen, $tgl_absen);
          foreach ($query_jam_dtg as $jam_datang) {
            $jam_dtg = $jam_datang['jam_datang'];
            if ($jam_dtg=="") {
                echo"<td align='center'> - </td>";
            } else {
                echo"<td align='center'>".$jam_datang['jam_datang']."</td>";
              }
			  echo"<td align='center'>".$jam_datang['Alias']."</td>";
            }

          $query_jam_plg =  $this->M_Rekap_Absen->get_jam_terbesar($id_absen, $tgl_absen);
          foreach ($query_jam_plg as $jam_pulang) {
            $jam_plg = $jam_pulang['jam_pulang'];
            if ($jam_plg=="" or $jam_plg==$jam_dtg){
                echo"<td align='center'> - </td>";
            } else {
                echo"<td align='center'>".$jam_pulang['jam_pulang']."</td>";
            }
			 echo"<td align='center'>".$jam_pulang['Alias']."</td>";
          }
        echo "
        <td>".$kalender['keterangan']."</td>
        </tr>";
      }
      echo "</tbody></table></div>";
    }
?>

<!-- /.table-responsive -->
<div class="well">
<h3> </h3>
<p></p>
<p></p>
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
</div>
<!-- /#page-wrapper -->
