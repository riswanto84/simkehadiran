
<?php
echo "<table class='table table-sm table-hover table-bordered table-striped'>";
echo "<hr/><b> Nama : ".$nama_pegawai."</b> / ID absen ".$badgenumber." <b>";
echo " </br>NIP &nbsp;&nbsp;&nbsp; : ".$nip." </b>(".$nomor.")</br>";

?>
<thead>
    <tr class="table-primary"><b>
        <td align="center">No</td>
        <td align="center">Hari</td>
        <td align="center">Tanggal</td>
        <td align="center">Jam Datang</td>
        <td align="center">Jam Pulang</td>
        <td  align="center">Keterangan</td></b>
    </tr>
</thead>

<?php
      $no=1;
      foreach($query_kalender as $kalender) {
        $hari = $kalender['hari'];
        $keterangan_libur = $kalender['keterangan'];
        if ($hari=="Sabtu" or $hari=="Minggu" or $keterangan_libur <> "") {
          $warna_tabel = "table-danger";
          } else {
            $warna_tabel = "table-light";
        }
        echo "<tr class='".$warna_tabel."'>";
        echo "
        <td align='center'>".$no."</td>
        <td td align='center'>".$kalender['hari']."</td>
        <td td align='center'>".format_indo($kalender['tgl_kalender'])."</td>";
        $tgl_absen = $kalender['tgl_kalender'];

        $CI =& get_instance();
        $CI->load->model('M_Rekap_Absen');
        $query_jam_dtg = $this->M_Rekap_Absen->get_jam_terkecil($id, $tgl_absen);
        foreach ($query_jam_dtg as $jam_datang) {
          $jam_dtg = $jam_datang['jam_datang'];
          if ($jam_dtg == "") {
          echo "<td align = center> - </td>";
            } else
          echo "<td align = center>".$jam_datang['jam_datang']."</td>";
          }

        $query_jam_plg =  $this->M_Rekap_Absen->get_jam_terbesar($id, $tgl_absen);
        foreach ($query_jam_plg as $jam_pulang) {
          $jam_plg = $jam_pulang['jam_pulang'];
          if($jam_plg == $jam_dtg) {
            echo "<td align = center> - </td>";
            } else {
            echo "<td align = center>".$jam_pulang['jam_pulang']."</td>";}
          }

        echo "<td td align='center'>".$kalender['keterangan']."</td></tr>";
        $no++;
      }
?>

</div>
</div>
</div>
</table>
