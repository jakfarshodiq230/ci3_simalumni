<div class="row">
    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Form Tambah Admin</h4>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/admin/config/simpanadmin" onsubmit="return cekform(); ">

                        <fieldset>
                            <input type="hidden" name="id_config" id="id_config" class="col-xs-10 col-sm-5" value="<?php echo $id_admin; ?>">

                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 col-sm-5 control-label">Nama</label>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <input type="text" name="nama" id="nama" placeholder="Masukkan Username" class="form-control" required="" value="<?php echo $username; ?>" />
                                        <span class="input-group-addon">
                                            <i class="ace-icon fa fa-pencil"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 col-sm-5 control-label">Username</label>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <input type="text" name="username" id="username" placeholder="Masukkan Username" class="form-control" required="" value="<?php echo $username; ?>" />
                                        <span class="input-group-addon">
                                            <i class="ace-icon fa fa-pencil"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 col-sm-5 control-label">Password</label>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" required="" value="<?php echo $password; ?>">
                                        <span class="input-group-addon">
                                            <i class="ace-icon fa fa-pencil"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 col-sm-5 control-label">Telepon</label>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <input type="text" name="telp" id="telp" placeholder="Masukkan Username" class="form-control" required="" value="<?php echo $username; ?>" />
                                        <span class="input-group-addon">
                                            <i class="ace-icon fa fa-pencil"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-actions center">
                            <button type="submit" class="btn btn-sm btn-success">
                                Simpan
                                <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                            </button>
                            <a href="<?php echo base_url(); ?>index.php/admin/config" class="btn btn-close btn-sm">
                                Tutup
                                <i class="ace-icon fa fa-close icon-on-right bigger-110"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>