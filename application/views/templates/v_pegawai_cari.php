<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
           	<h4 class="page-header">Hasil pencarian :</h4>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                </div>
            </div>
            <div class="panel panel-default">
            	<div class="panel-body">
            		<table border width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            			 <thead>
                            <tr>
                            	<th>No</th>
								<th>Nama</th>
								<th>NIP</th>
								<th>Nama Kantor</th>
								<th>lihat absen</th>
                            </tr>
                         </thead>
                         <?php
                         	$no=1;
                         	foreach ($hasil_cari_peg as $hasil_cari_peg) {
                         		echo "<tr class='odd gradeX'>";
                         		echo form_open('pages/c_detail_peg');
                         		echo "<td>".$no."</td>";
                         		echo "<td>".$hasil_cari_peg->NM_PEG."</td>";
                         		echo "<td>".$hasil_cari_peg->NIP."</td>";
                         		echo "<td>".$hasil_cari_peg->NM_KANTOR."</td>";
                         		$nip = $hasil_cari_peg->NIP;
                         		$CI =& get_instance();
        						$CI->load->model('M_Pegawai');
        						$query_peg = $this->M_Pegawai->get_data_pegawai_nip($nip)->result();
        						foreach ($query_peg as $query_peg) {
        							$unit = $query_peg->NM_UNIT_ORG;
        						}
                         		echo "<input type='hidden' name='unit_org'"; ?> value="<?php echo $unit; ?>">
                         		<input type="hidden" name="nip" value="<?php echo $hasil_cari_peg->NIP; ?>" />
                         		
                         		<td><input type="submit" name="search_submit" value="Pilih" class="btn btn-success"></td>
                         		<?php
                         		echo form_close();
                         		$no++;
                         	}	
                         ?>

            		</table>
            	</div>
            </div>
        </div>         
    </div>
</div>
 <!-- /#page-wrapper -->
