<div class="row">
	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Form Tambah username Alumni</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<form class="form-horizontal" method="POST" action="<?php echo site_url('admin/alumni/simpan');?>">
						
						<fieldset>
							<input type="hidden" name="id" id="id" class="col-xs-10 col-sm-5" value="<?php echo $id; ?>">
						</fieldset>

						<fieldset class="style-1 full-name">
                    		<label>Username :</label>
                    		<input type="text" name="username" placeholder="Username" id="username" maxlength="10" onKeyUp="CekNim()" onkeypress="return hanyaAngka(event)" required="" class="form-control">
                  		</fieldset>
						<div id="notifikasi_cek_nim" class="alert alert-danger"><strong>NIM Sudah Terdaftar Disistem Alumni</strong></div>
                        <fieldset class="style-1 full-name" id="idnama">
                    		<label>Nama :</label>
                    		<input type="text" name="nama" placeholder="nama" id="nama" required="" class="form-control">
                  		</fieldset>
						<fieldset class="style-1 full-name" id="control_password">
                    		<label>Password :</label>
                    		<input type="password" name="password" placeholder="Password" id="password"  class="form-control">
                  		</fieldset>

                  		<fieldset class="style-1 full-name" id="control_kon_password">
                    		<label>Konfirmasi Password :</label>
                   		 <input type="password" name="konf_password" placeholder="Konfirmasi Password" id="konf_password"  class="form-control">
                  		</fieldset>

						<div class="form-actions center" id="daftar">
							<button type="submit" class="btn btn-sm btn-success">
								Simpan
								<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
							</button>
							<a href="<?php echo site_url('admin/alumni');?>" class="btn btn-close btn-sm">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<!-- cek data alumni -->
<script type="text/javascript">
$("#daftar").hide();
$("#control_password").hide();
$("#control_kon_password").hide();
$("#notifikasi_cek_nim").hide();
$("#idnama").hide();
function CekNim() {

          $("#daftar").hide();
          $("#control_password").hide();
          $("#control_kon_password").hide();
          $("#notifikasi_cek_nim").hide();
		  $("#idnama").hide();
                var nim=$("#username").val();
                var cek_jumlah_nim = nim.toString().length;
                if(cek_jumlah_nim <= 10){
                    // console.log(cek_jumlah_nim);
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('/Login/daftar_alumni')?>",
                        dataType : "JSON",
                        data : {nim: nim},
                        cache:false,
                        success: function(data){
							console.log(data);
                          if(data != null){
                              $("#daftar").hide();
                              $("#control_password").hide();
                              $("#control_kon_password").hide();
							  $("#idnama").hide();
							  	if(cek_jumlah_nim == 0){
									$("#notifikasi_cek_nim").hide();
								}else{
									$("#notifikasi_cek_nim").show();
								}
                          }else{
                            $("#daftar").show();
							$("#control_password").show();
							$("#control_kon_password").show();
							$("#idnama").show();
							$("#notifikasi_cek_nim").hide();                            
                          }
                        }
                    });
                  return false;
                }else{
                  $("#daftar").hide();
                  $("#control_password").hide();
                  $("#control_kon_password").hide();
                  $("#notifikasi_cek_nim").hide();
				  $("#idnama").hide();
                }
    
}
function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}
</script>