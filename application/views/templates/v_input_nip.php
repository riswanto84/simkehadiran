<div id="page-wrapper">
  <div class="row">
    	<div class="col-lg-12">
            <h4 class="page-header">Update NIP Pegawai Database Absensi</h4>
        </div>
        <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4>Kata kunci pencarian : (NIP / Nama / ID Absen)</h4>
            <?php echo form_open('pages/c_input_nip/cari') ?>
          	<div class="input-group custom-search-form">
            <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default" id="btnSearchNIP" type="submit">
                   <i class="fa fa-search"></i>
                </button>
            </span>

            <?php echo form_close() ?>
          </div>
          <div class="row">
            <div class="col-lg-8">
              </br>
              <small class="text-muted">Pegawai yang sudah dibuatkan ID absen, harus dilakukan input NIP agar bisa terbaca pada sistem</small>
            </div>
          </div>
      	</div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
  <div class="panel-default">
   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>ID Absen</th>
        <th>Pilih</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        if ($jumlah_row>0) {
          $no=1;
          foreach ($hasil as $hasil ) { 
    ?>  
              <tr class="odd gradex">
                <td><?php echo $no; ?></td>
                <td><?php echo $hasil->name; ?></td>
                <td><?php echo $hasil->nip; ?></td>
                <td><?php echo $hasil->badgenumber; ?></td>
                <td>
                  <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal<?php echo $hasil->userid;?>"> Update Data</a>
                </td>
                
                <div class="modal fade" id="myModal<?php echo $hasil->userid;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">UPDATE NIP</h4> 
                          </div>
                          <form action="<?php echo base_url();?>pages/c_input_nip/update_nip" method="post">
                          <div class="modal-body">
                              <div class="form-group">
                              <label for="id_absen">ID ABSEN</label>
                              <input type="text" class="form-control" name="id_absen" placeholder="<?php echo $hasil->badgenumber; ?>" disabled>
                              </div>
                              <div class="form-group">
                              <label for="nim">NAMA</label>
                              <input type="text" class="form-control" name="nama" placeholder="<?php echo $hasil->name; ?> (Isikan nama sesuai SIMPEG)">
                              </div>
                              <div class="form-group">
                              <label for="nip">NIP</label>
                              <input type="text" class="form-control" name="nip" placeholder="<?php echo $hasil->nip; ?> (isikan NIP yang sesuai)">
                              </div>
                              <small class="text-muted">
                                <u>PERHATIAN :</u>
                                <br>1. Isikan NIP jika NIP belum ada, atau NIP yang terdaftar salah.</br>2. Apabila NIP sudah benar maka tidak perlu dilakukan input
                              </small>
                          </div>  
                          <div class="modal-footer">
                            <input type="hidden" name="keyword" value="
                              <?php echo $keyword ?>" />
                            <input type="hidden" name="userid" value="
                              <?php echo $hasil->userid; ?>" />
                            <input type="hidden" name="badgenumber" value="
                              <?php echo $hasil->badgenumber; ?>" />

                            <button type="submit" class="btn btn-info">Simpan</button>
                          </div>
                          </form>
                        </div>
                      </div>
              </div>
              </tr>
              <?php
                  $no++; 
                }
              }
                else{
                  echo "<td><p class='text-muted'>".$pesan."</p</td>";
                }
              ?>
    </tbody>
   </table>
  </div>
</div>
</div>