<div class="row">
	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Form Tambah album</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/admin/album/simpan">
						
						<fieldset>
							<input type="hidden" name="id_album" id="id_album" class="col-xs-10 col-sm-5" value="<?php echo $id_album; ?>">

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Nama Album</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input type="text" name="nama_album" id="nama_album" placeholder="Nama Album" class="form-control" required="" value="<?php echo $nama_album; ?>"/>
										<span class="input-group-addon">
											<i class="ace-icon fa fa-pencil"></i>
										</span>
									</div>
									<span class="help-block">Judul harus tanpa spasi.</span>
								</div>
							</div>
						</fieldset>

						<div class="form-actions center">
							<button type="submit" class="btn btn-sm btn-success">
								Simpan
								<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
							</button>
							<a href="<?php echo base_url();?>index.php/admin/album" class="btn btn-close btn-sm">
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