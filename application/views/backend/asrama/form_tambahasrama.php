<div class="row">
	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Form Tambah Jurusan</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/admin/asrama/simpan" onsubmit="return cekform(); ">

						<fieldset>
							<input type="hidden" name="id_asrama" id="id_asrama" class="col-xs-10 col-sm-5" value="<?php echo $id_asrama; ?>">

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Nama Jurusan</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input type="text" name="nama_asrama" id="nama_asrama" placeholder="Nama asrama" class="form-control" required="" value="<?php echo $nama_asrama; ?>" />
										<span class="input-group-addon">
											<i class="ace-icon fa fa-pencil"></i>
										</span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-2 col-md-3 col-sm-5 control-label">Singkatan</label>
								<div class="col-xs-4">
									<div class="input-group">
										<input type="text" name="singkatan" id="singkatan" placeholder="Singkatan" class="form-control" required="" value="<?php echo $singkatan; ?>">
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
							<a href="<?php echo base_url(); ?>index.php/admin/asrama" class="btn btn-close btn-sm">
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