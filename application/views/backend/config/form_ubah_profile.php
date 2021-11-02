<?php
$info = $this->session->flashdata('Info');
if($info!=""){ ?>
<div id="notifikasi" class="alert alert-success"><strong>Sukses ! </strong> <?=$info;?>
</div>
<?php } ?>

<div class="row">
	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Form Ubah Profile</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<form id="form1" class="form-horizontal" method="POST" action="<?php echo site_url('admin/config/simpan_profile');?>" enctype="multipart/form-data">
           <?php 
           $adm=$this->session->userdata('id');
           $qu=$this->db->query("SELECT * from admin where id='$adm'")->row_array(); ?>
           <fieldset>
             <input type="hidden" name="id" id="id" class="col-xs-10 col-sm-5" value="<?php echo $qu['id']; ?>">


             <div id="user-profile-1" class="navbar-buttons navbar-header pull-right">
              <div class="col-xs-12">
               <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#ganti">
                <i class="ace-icon fa fa-lock"></i>
                Ubah Password
              </a>
            </div>
          </div>

          <div id="user-profile-1" class="user-profile row">
            <div class="col-xs-12 col-sm-8 center">
             <span class="profile-picture">
               <img class="editable img-responsive" src="<?php echo base_url('uploads/foto_user/'.$qu['foto']); ?>" width="200" height="200">
             </span>
           </div>
         </div>

         <div class="space-4"></div>

         <div class="form-group">
           <label class="col-lg-2 col-md-3 col-sm-5 control-label">Foto</label>
           <div class="col-xs-4">
             <div class="input-group">
              <input type="file" name="foto" id="foto" class="form-control" value="<?php echo $qu['foto']; ?>">
              <span class="input-group-addon">
               <i class="ace-icon fa fa-camera"></i>
             </span>
           </div>
           <span class="help-block">Maksimal ukuran 1 Mb (JPG/PNG)</span>
         </div>
       </div>

       <div class="form-group">
         <label class="col-lg-2 col-md-3 col-sm-5 control-label">Nama</label>
         <div class="col-xs-4">
           <div class="input-group">
            <input type="text" name="nama" id="nama" class="form-control" required="" value="<?php echo $qu['nama']; ?>" />
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
          <input type="text" name="username" id="username" class="form-control" required="" value="<?php echo $qu['username']; ?>" onkeyup="cek_username()" />
          <span class="input-group-addon">
           <i class="ace-icon fa fa-pencil"></i>
         </span>
       </div>
       <span id="pesan_username"></span>
     </div>
   </div>

   <div class="form-group">
    <label class="col-lg-2 col-md-3 col-sm-5 control-label">Telp</label>
    <div class="col-xs-4">
      <div class="input-group">
        <input name="telp" id="telp" class="form-control" required="" value="<?php echo $qu['telp']; ?>" />
        <span class="input-group-addon">
          <i class="ace-icon fa fa-pencil"></i>
        </span>
      </div>
    </div>
  </div>
  
</fieldset>

<div class="form-actions center">
 <button id="submit" name="submit" type="submit" class="btn btn-sm btn-success">
  Simpan
  <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
</button>
<a href="<?php echo site_url('admin/home');?>" class="btn btn-close btn-sm">
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

<div id="ganti" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><strong>UbahPassword</strong></h4>
      </div>
      <div class="modal-body">

       <form id="form-password" class="form-horizontal" action="<?php echo base_url();?>index.php/admin/home/update" method="post">
        <input type="hidden" name="id" id="id" class="col-xs-10 col-sm-5" value="<?php echo $qu['id']; ?>">
        <div class="form-group">
          <label class="col-sm-4 control-label" for="form-field-pass1">Password :</label>
          <div class="col-sm-5">
            <input type="password" class="form-control" placeholder="Masukkan Password" name="password" id="password" />
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-4 control-label" for="form-field-pass2">Konfirmasi Password :</label>
          <div class="col-sm-5">
            <input type="password" name="konf_password" placeholder="Masukkan Konfirmasi Password" class="form-control" id="konf_password" />
          </div>
        </div>
        <label class="col-sm-4 control-label" for="form-field-pass2"></label><input id="checkbox" type="checkbox" class="form-checkbox" > Show Password
      </div>

      <div class="modal-footer">
       <button type="submit" name="submit" class="btn btn-sm btn-primary">
        Simpan
        <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
      </button>
      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
        Tutup
        <i class="ace-icon fa fa-close icon-on-right bigger-110"></i>
      </button>
    </div>
  </form>
  
  <br>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type='text/javascript'>
var error = 2; 

function cek_username(){
  $("#pesan_username").hide();

  var username = $("#username").val();

  if(username != ""){
    $.ajax({
      url: "<?php echo site_url('admin/config/cek_status_username');?>", 
      data: 'username='+username,
      type: "POST",
      success: function(msg){
        if(msg==2){
          $("#pesan_username").css("color","#59c113");
          $("#username").css("border-color","#59c113");
          $("#pesan_username").html("Username tersedia");
          $("#submit").attr('disabled',false);

          error = 2;
        }else{
         $(msg).closest('.form-group').removeClass('has-info').addClass('has-error');
         $("#pesan_username").css("color","#fc5d32");
         $("#username").css("border-color","#fc5d32");
         $("#pesan_username").html("Maaf, username sudah terdaftar");
         $("#submit").attr('disabled','');
         error = 1;
       }

       $("#pesan_username").fadeIn(1000);
     }
   });
  }       
  
}

</script>

<script type="text/javascript">

$().ready(function () {
 
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


    highlight: function (e) {
      $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
    },

    success: function (e) {
      $(e).closest('.form-group').removeClass('has-error');
      $(e).remove();
    }

  })
});

</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#checkbox").click(function(){
    if($(this).is(':checked')){
      $("#password").attr('type','text') && $("#konf_password").attr('type','text');
    } else{
      $("#password").attr('type','password') && $("#konf_password").attr('type','password');
    }
  });
});
</script>