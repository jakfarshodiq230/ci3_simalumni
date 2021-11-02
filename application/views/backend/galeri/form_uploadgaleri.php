
<div class="widget-header">
	<h4 class="widget-title">Upload foto ke album <b><?php echo $nama_album; ?></b></h4>
</div>

<form method="POST" action="<?php echo site_url('admin/galeri/upload');?>" enctype="multipart/form-data" class="dropzone" id="dropzone">
	<input type="hidden" name="id_galeri" id="id_galeri">
	<input type="hidden" name="id_album" id="id_album" value="<?php echo $id_album; ?>">

	<div class="fallback">
		<input name="gambar" id="gambar" type="file" multiple="" />
	</div>
</form>

<script src="<?php echo base_url();?>assets/js/dropzone.js"></script>

<script type="text/javascript">
jQuery(function($){
	
	try {
		Dropzone.autoDiscover = false;
		var myDropzone = new Dropzone("#dropzone" , {
	    paramName: "gambar", // The name that will be used to transfer the file
	    maxFilesize: 0.5, // MB
	    
	    addRemoveLinks : true,
	    dictDefaultMessage :
	    '<span class="bigger-150 bolder"><i class="ace-icon fa fa-caret-right red"></i> Drop files</span> to upload \
	    <span class="smaller-80 grey">(or click)</span> <br /> \
	    <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>'
	    ,
	    dictResponseError: 'Error while uploading file!',
	    
		//change the previewTemplate to use Bootstrap progress bars
		previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
	});
		
		$(document).one('ajaxloadstart.page', function(e) {
			try {
				myDropzone.destroy();
			} catch(e) {}
		});
		
	} catch(e) {
		alert('Dropzone.js does not support older browsers!');
	}
	
});
</script>