
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/themes/modern/theme.min.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/wordcount/plugin.js"></script>
<script src="<?php echo base_url();?>assets/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>

<div class="row">
	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Form Edit Config</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/admin/config/simpan">
						
						<fieldset>
							<input type="hidden" name="id_config" id="id_config" class="col-xs-10 col-sm-5" value="<?php echo $id_config; ?>">

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Judul</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input type="text" name="title" id="title" class="form-control" disabled="" value="<?php echo $title; ?>" />
										<span class="input-group-addon">
											<i class="ace-icon fa fa-pencil"></i>
										</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Konten</label>
								<div class="col-xs-9">
									<div class="controls">
										<textarea name="konten" id="konten" style="height:300px;width:100%;"><?php echo $konten; ?></textarea>
									</div>
								</div>
							</div>
						</fieldset>

						<div class="form-actions center">
							<button type="submit" class="btn btn-sm btn-success">
								Simpan
								<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
							</button>
							<a href="<?php echo base_url();?>index.php/admin/config" class="btn btn-close btn-sm">
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