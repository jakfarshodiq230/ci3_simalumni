
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
				<h4 class="widget-title">Form Tambah berita</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/admin/berita/simpan" enctype="multipart/form-data" onsubmit="return cekform(); ">
						
						<fieldset>
							<input type="hidden" name="id_berita" id="id_berita" class="col-xs-10 col-sm-5" value="<?php echo $id_berita; ?>">

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Judul Berita</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input type="text" name="judul_berita" id="judul_berita" placeholder="Judul" class="form-control" required="" value="<?php echo $judul_berita; ?>">
										<span class="input-group-addon">
											<i class="ace-icon fa fa-pencil"></i>
										</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Penulis</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input type="text" name="penulis" id="penulis" placeholder="Penulis" class="form-control" required="" value="<?php echo $penulis; ?>">
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
										<input type="text" class="form-control date-picker" id="tanggal"  name="tanggal" placeholder="Tanggal" data-date-format="yyyy-mm-dd" required="" value="<?php echo $tanggal; ?>" />
										<span class="input-group-addon">
											<i class="ace-icon fa fa-calendar"></i>
										</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Gambar</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input type="file" name="gambar" id="gambar" class="form-control" >
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
									<img src="<?php echo base_url().'uploads/berita/'.$gambar; ?>" width="150">
								</div>
							</div>
						</fieldset>

						<div class="form-actions center">
							<button type="submit" class="btn btn-sm btn-success">
								Simpan
								<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
							</button>
							<a href="<?php echo base_url();?>index.php/admin/berita" class="btn btn-close btn-sm">
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