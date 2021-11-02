<section class="main-content blog-single">
    <div class="container">
        <div class="row">
            <div class="post-wrap">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Cari Berdasarkan : </h3>
                        </div>
                        <div class="panel-body">
                            <form id="form-filter" class="form-horizontal" method="get">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><b>Nama :</b></td>
                                            <td>
                                                <input type="text-area" class="form-control" placeholder="Masukkan Kata Kunci Nama" id="nama" name="nama">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>Tahun Lulus:</b></td>
                                            <td>
                                                <input type="text-area" class="form-control" placeholder="Masukkan Kata Kunci Tahun Lulus" id="tahun" name="tahun">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>Jurusan:</b></td>
                                            <td>
                                                <select name="asrama" id="asrama" class="form-control">
                                                    <option value=''>Semua Jurusan</option>
                                                    <?php
                                                    $asrama = $this->db->get('asrama');
                                                    foreach ($asrama->result() as $row) {

                                                    ?>
                                                        <option value="<?php echo $row->nama_asrama; ?>"><?php echo $row->nama_asrama; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>

                                    </table>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"></label>
                                        <div class="col-sm-4">
                                            <button type="button" id="btn-submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                                            <button type="button" id="btn-reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table id="table" border="1" class="table table-striped table-bordered data" cellspacing="1" width="100%">
                        <thead>

                            <tr style="background: #62bde5;">
                                <td><b>No</b></td>
                                <td><b>Nim</b></td>
                                <td><b>Nama Lengkap</b></td>
                                <td><b>Jenis Kelamin</b></td>
                                <td><b>Jurusan</b></td>
                                <td><b>No Telp</b></td>
                                <td><b>Tahun Lulus</b></td>
                                <td><b>Aksi</b></td>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Detail Alumni</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id" />
                    <div class="form-body">
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-4">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Nim:</label>
                            <div class="col-md-3">
                                <input name="username" class="form-control" type="text" disabled="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Nama Lengkap :</label>
                            <div class="col-md-3">
                                <input name="nama_lengkap" class="form-control" type="text" disabled="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Jenis Kelamin :</label>
                            <div class="col-md-3">
                                <input name="jenis_kelamin" class="form-control" type="text" disabled="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Jurusan:</label>
                            <div class="col-md-3">
                                <input name="id_asrama" class="form-control" type="text" disabled="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">No Telp :</label>
                            <div class="col-md-3">
                                <input name="telp" class="form-control" type="text" disabled="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Tahun Lulus :</label>
                            <div class="col-md-3">
                                <input name="tahun_lulus" class="form-control" type="text" disabled="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Email :</label>
                            <div class="col-md-3">
                                <input name="email" class="form-control" type="text" disabled="">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5">Profesis :</label>
                            <div class="col-md-3">
                                <input name="profesi" class="form-control" type="text" disabled="">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">Tempat Bekerja :</label>
                                <div class="col-md-3">
                                    <input name="tempat_kerja" class="form-control" type="text" disabled="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">Agama :</label>
                                <div class="col-md-3">
                                    <input name="agama" class="form-control" type="text" disabled="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">Provinsi :</label>
                                <div class="col-md-3">
                                    <input name="id_provinsi" class="form-control" type="text" disabled="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">Kabupaten :</label>
                                <div class="col-md-3">
                                    <input name="id_kabupaten" class="form-control" type="text" disabled="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-5">Alamat :</label>
                                <div class="col-md-3">
                                    <textarea name="alamat" class="form-control" type="text" disabled=""></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->