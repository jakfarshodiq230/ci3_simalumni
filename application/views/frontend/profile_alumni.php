<?php
$adm = $this->session->userdata('id');
$qu = $this->db->query("SELECT * from alumni where id='$adm'")->row_array(); ?>

<div class="container">
  <div class="row">

    <section class="flat-row flat-member-single padding-v1">
      <div class="container">
        <div class="row">
          <div class="member-single">
            <div class="col-md-9">

              <div class="col-md-3">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <span class="text-center">
                      <h3 class="panel-title">Ubah Foto </h3>
                    </span>
                  </div>
                  <div class="panel-body">
                    <div class="item-thumbnail">
                      <?php
                      $img = $qu['foto'];
                      if (empty($img)) { ?>
                        <img src="<?php echo base_url("assets/web/images/no_photo.png"); ?>">
                      <?php } else { ?>
                        <img src="<?php echo base_url("uploads/alumni/" . $qu["foto"]); ?>">
                      <?php } ?>

                    </div>
                    <br>
                    <form class="form-horizontal" method="POST" action="<?php echo site_url('alumni/ubah_foto'); ?>" enctype="multipart/form-data">

                      <input type="hidden" name="id" value="<?php echo $qu['id']; ?>">

                      <input type="file" name="foto" id="foto" required="" autofocus="" class="span6">
                      <span class="help-block">Format harus jpg atau png. Maksimal ukuran 1 Mb.</span>

                      <button type="submit" class="btn btn-primary">
                        <span class="bigger-110"><i class="glyphicon glyphicon-picture"></i> Ubah Foto</span>
                      </button>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-9">
                <div class="content-pad">

                  <?php
                  $info = $this->session->flashdata('Info');
                  if ($info != "") { ?>
                    <div id="notifikasi" class="alert alert-success"><strong>Sukses ! </strong> <?= $info; ?>
                    </div>
                  <?php } ?>

                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <span class="text-center">
                        <h3 class="panel-title">Biodata Anda </h3>
                      </span>
                    </div>
                    <div class="panel-body">
                      <form class="form-horizontal" method="POST" action="<?php echo site_url('alumni/simpan'); ?>">

                        <table class="table table-bordered">
                          <input type="hidden" class="span6" name="id" value="<?php echo $qu['id']; ?>">
                          <tr>
                            <td><b>username :</b></td>
                            <td>
                              <input type="text-area" class="form-control" id="username" name="username" required="" value="<?php echo $qu['username']; ?>">
                            </td>
                          </tr>

                          <tr>
                            <td><b>Nama Lengkap :</b></td>
                            <td>
                              <input type="text-area" class="form-control" id="nama_lengkap" name="nama_lengkap" required="" value="<?php echo $qu['nama_lengkap']; ?>">
                            </td>
                          </tr>

                          <tr>
                            <td><b>Jenis Kelamin :</b></td>
                            <td>

                              <?php
                              echo form_dropdown('jenis_kelamin', array('~ Jenis Kelamin ~', 'Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'), $qu['jenis_kelamin'], "class='form-control'");
                              ?>
                            </td>
                          </tr>

                          <tr>
                            <td><b>Email :</b></td>
                            <td>
                              <input type="text-area" class="form-control" id="email" name="email" value="<?php echo $qu['email']; ?>">
                            </td>
                          </tr>

                          <tr>
                            <td><b>Telp :</b></td>
                            <td>
                              <input type="text-area" class="form-control" id="telp" name="telp" value="<?php echo $qu['telp']; ?>">
                            </td>
                          </tr>

                          <tr>
                            <td><b>Tempat Lahir :</b></td>
                            <td>
                              <input type="text-area" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $qu['tempat_lahir']; ?>">
                            </td>
                          </tr>

                          <tr>
                            <td><b>Tanggal Lahir :</b></td>
                            <td>
                              <input class="form-control datepicker" required="" data-date-format="yyyy-mm-dd" type="text-area" name="tanggal_lahir" placeholder="Tanggal Lahir" style="width:180px" value="<?php echo date("d F Y", strtotime($qu['tanggal_lahir'])); ?>">
                            </td>
                          </tr>

                          <tr>
                            <td><b>Tahun Lulus :</b></td>
                            <td>
                              <input type="text-area" class="form-control" id="tahun_lulus" name="tahun_lulus" required="" value="<?php echo $qu['tahun_lulus']; ?>">
                            </td>
                          </tr>

                          <tr>
                            <td><b>Jurusan :</b></td>
                            <td>
                              <?php
                              echo cmb_dinamis('id_asrama', 'asrama', 'nama_asrama', 'id_asrama', $qu['id_asrama']);
                              ?>
                            </td>
                          </tr>

                          <tr>
                            <td><b>Agama :</b></td>
                            <td>

                              <?php
                              echo form_dropdown(
                                'agama',
                                array(
                                  '~ Pilih Agama ~',
                                  'Islam' => 'Islam',
                                  'Kristen' => 'Kristen',
                                  'Katholik' => 'Katholik',
                                  'Hindu' => 'Hindu',
                                  'Budha' => 'Budha'
                                ),
                                $qu['agama'],
                                "class='form-control'"
                              );
                              ?>
                            </td>
                          </tr>

                          <tr>
                            <td><b>Status Kerja :</b></td>
                            <td>
                              <?php
                              echo form_dropdown(
                                'profesi',
                                array(
                                  '~ Pilih Status Kerja~',
                                  'Bekerja' => 'Bekerja',
                                  'Nganggur ' => 'Nganggur'
                                ),
                                $qu['profesi'],
                                "class='form-control'"
                              );
                              ?>
                          </tr>

                          <tr>
                            <td><b>Tempat Kerja :</b></td>
                            <td>
                              <p> *Isi "Menganggur" jika Anda tidak bekerja!</p>
                              <input type="text-area" class="form-control" id="tempat_kerja" name="tempat_kerja" value="<?php echo $qu['tempat_kerja']; ?>">

                            </td>
                          </tr>
                          <tr>
                            <td><b>Provinsi :</b></td>
                            <td>

                              <?php
                              echo cmb_dinamis('id_provinsi', 'provinsi', 'nama_provinsi', 'id_provinsi', $qu['id_provinsi'], "id='id_provinsi' onChange='loadKabupaten()'");
                              ?>
                            </td>
                          </tr>

                          <tr>
                            <td><b>Kabupaten :</b></td>
                            <td>
                              <?php
                              echo cmb_dinamis('id_kabupaten', 'kabupaten', 'nama_kabupaten', 'id_kabupaten', $qu['id_kabupaten'], "id='kabupatenArea'");
                              ?>

                            </td>
                          </tr>

                          <tr>
                            <td><b>Alamat :</b></td>
                            <td>
                              <textarea class="form-control" id="alamat" name="alamat" value="<?php echo $qu['alamat']; ?>"><?php echo $qu['alamat']; ?></textarea>
                              <p>ex : (JL.Merdeka Raya RT 11 RW 09, Kelurahan Babakan, Kec. Benda)</p>
                            </td>
                          </tr>

                        </table>
                        <div class="text-center">
                          <button type="submit" name="submit" class="btn btn-primary"><i class="ace-icon fa fa-save"></i> Simpan</button>
                        </div>
                      </form>
                    </div>


                  </div>
                </div>
                <!--/content-pad-->
              </div>
              <!--/col-md-8-->

            </div>

            <div class="col-md-3">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <span class="text-center">
                    <h3 class="panel-title">Ubah Password</h3>
                  </span>
                </div>
                <div class="panel-body">
                  <form id="form-password" class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/alumni/simpan_password">
                    <input type="hidden" name="id" id="id" class="col-xs-10 col-sm-5" value="<?php echo $qu['id']; ?>">

                    <fieldset class="style-1 username">
                      <input type="password" name="password" placeholder="Masukkan Password" id="password" class="form-control" required="">
                    </fieldset>

                    <fieldset class="style-1 username">
                      <input type="password" name="konf_password" placeholder="Masukkan Konfirmasi Password" id="konf_password" class="form-control" required="">
                    </fieldset>

                    <div class="clearfix">
                      <button type="submit" name="submit" class="btn btn-primary">
                        <i class="ace-icon fa fa-save"></i> Simpan
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- <div class="panel panel-danger">
    <div class="panel-heading">
      <span class="text-center"><h3 class="panel-title" >Download APK</h3></span>
    </div>
    <div class="panel-body">
      <div id="alert" class="alert alert-warning">
       Dapatkan informasi terbaru di Smartphone :
     </div>
     <a href="https://" target="_blank">Alumni-SMANSARI.apk</a>
   </div>
 </div> -->
            </div>
          </div>
        </div><!-- /row -->
      </div>
    </section>

  </div>
</div>

<script type="text/javascript">
  function loadKabupaten() {
    var propinsi = $("#id_provinsi").val();
    $.ajax({
      type: 'GET',
      url: "<?php echo site_url('alumni/kabupaten'); ?>",
      data: "id_provinsi=" + propinsi,
      success: function(html) {
        $("#kabupatenArea").html(html);
      }
    });
  }
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
  $().ready(function() {

    $("#form-password").validate({
      errorElement: 'div',
      errorClass: 'help-block',
      focusInvalid: false,
      rules: {

        password: {
          required: true,
          minlength: 5
        },
        konf_password: {
          required: true,
          minlength: 5,
          equalTo: "#password"
        }

      },

      messages: {

        password: {
          required: "Password harus diisi",
          minlength: "Password harus minimal 5 karakter"
        },
        konf_password: {
          required: "Password harus diisi",
          minlength: "Password harus minimal 5 karakter",
          equalTo: "Password tidak cocok"
        }
      },


      highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
      },

      success: function(e) {
        $(e).closest('.form-group').removeClass('has-error');
        $(e).remove();
      }

    })
  });
</script>