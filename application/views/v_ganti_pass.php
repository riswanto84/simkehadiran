<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Ganti Password : <span class="glyphicon glyphicon-edit form-control-feedback"></span></h3>
            <div class="row">
                <div class="col-lg-12">
                <p class="bg-success"><?php echo $this->session->flashdata('error');  ?></p>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
     <div class="row">
        <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo base_url() ?>Login/save_password" method="post">
                <div class="form-group">
                    <label for="old" class="col-md-2 control-label">Password lama</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="old" name="old" placeholder="masukan password lama" value="<?php echo set_value('old');?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="new" class="col-md-2 control-label">Password Baru</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="new" name="new" placeholder="masukan password baru" value="<?php echo set_value('new');?>" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="re-new" class="col-md-2 control-label">Ulangi password</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="re-new" name="re-new" placeholder="ulangi masukan password baru" value="<?php echo set_value('re_new'); ?>"  required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-success btn-m" value="Simpan">
                    </div>
                </div>
               </form>

            </div>
        </div>
        </div>
    </div>
</div>