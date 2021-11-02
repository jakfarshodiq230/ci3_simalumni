
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/themes/modern/theme.min.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/wordcount/plugin.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.js"></script>

<script src="<?php echo base_url();?>assets/js/chosen.jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/date-time/daterangepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.autosize.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.inputlimiter.1.3.1.js"></script>

<div class="row">
	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Form Tambah Agenda</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/admin/agenda/simpan" enctype="multipart/form-data" onsubmit="return cekform(); ">
						
						<fieldset>
							<input type="hidden" name="id_agenda" id="id_agenda" class="col-xs-10 col-sm-5" value="<?php echo $id_agenda; ?>">

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Judul Agenda</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input type="text" name="judul_agenda" id="judul_agenda" placeholder="Judul" class="form-control" required="" value="<?php echo $judul_agenda; ?>">
										<span class="input-group-addon">
											<i class="ace-icon fa fa-pencil"></i>
										</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Isi</label>
								<div class="col-xs-9">
									<div class="controls">
										<textarea name="isi" id="isi" style="height:300px;width:100%;"><?php echo $isi; ?></textarea>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Tanggal</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input type="text" class="form-control date-picker" id="tanggal_start"  name="tanggal_start" placeholder="Tanggal" data-date-format="dd-mm-yyyy" required="" value="<?php echo $tanggal_start; ?>" />
										<span class="input-group-addon">
											<i class="ace-icon fa fa-calendar"></i>
										</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Jam</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input id="timepicker1" type="text" name="waktu_start" class="form-control" value="<?php echo $waktu_start; ?>" />
										<span class="input-group-addon">
											<i class="fa fa-clock-o bigger-110"></i>
										</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Gambar</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input type="file" name="gambar" id="gambar" placeholder="Gambar" class="form-control" >
										<span class="input-group-addon">
											<i class="ace-icon fa fa-camera"></i>
										</span>
									</div>
									<span class="help-block">Maksimal ukuran 1 Mb (JPG/PNG)</span>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label"></label>
								<div class="col-sm-9">
									<img src="<?php echo base_url().'uploads/agenda/'.$gambar; ?>" width="150">
								</div>
							</div>
						</fieldset>

						<div class="form-actions center">
							<button type="submit" class="btn btn-sm btn-success">
								Simpan
								<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
							</button>
							<a href="<?php echo base_url();?>index.php/admin/agenda" class="btn btn-close btn-sm">
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

<script type="text/javascript">
$('#timepicker1').timepicker({
	minuteStep: 1,
	showSeconds: true,
	showMeridian: false
}).next().on(ace.click_event, function(){
	$(this).prev().focus();
});

$('#date-timepicker1').datetimepicker().next().on(ace.click_event, function(){
	$(this).prev().focus();
});
</script>