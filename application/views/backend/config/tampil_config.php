<script type="text/javascript">
	jQuery(function($) {
		var oTable1 =
			$('#table-config')

			.dataTable({
				bAutoWidth: false,
				"aoColumns": [

					null, null, null,
					{
						"bSortable": false
					}
				],
				"aaSorting": [],
			});
	})
</script>

<?php
$info = $this->session->flashdata('Info');
if ($info != "") { ?>
	<div id="notifikasi" class="alert alert-success"><strong>Sukses ! </strong> <?= $info; ?>
	</div>
<?php } ?>

<?php
$data1 = $this->session->flashdata('error');
if ($data1 != "") { ?>
	<div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?= $data1; ?></div>
<?php } ?>

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row">
			<div class="col-sm-12">
				<!-- #section:elements.tab -->
				<div class="table-header">
					<a href="<?php echo base_url(); ?>index.php/admin/config/tambahadmin" class="btn btn-success btn-xs"><i class="ace-icon fa fa-plus"></i> Tambah Admin</a>
				</div>
				<div class="tabbable">
					<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">

						<li class="active">
							<a data-toggle="tab" href="#config">
								<i class="blue ace-icon fa fa-cogs bigger-130"></i>
								Config
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#foto">
								<i class="blue ace-icon fa fa-camera bigger-130"></i>
								Gambar Web
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#slider">
								<i class="blue ace-icon glyphicon glyphicon-picture bigger-130"></i>
								Slider
							</a>
						</li>

					</ul>

					<div class="tab-content">
						<div id="config" class="tab-pane fade in active">
							<table id="table-config" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Konten</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
										$no = 1;
										foreach ($data->result() as $row) {
										?>
											<td><?php echo $no++; ?></td>
											<td><?php echo $row->title; ?></td>
											<td><?php echo character_limiter(strip_tags($row->content), 100); ?></td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="green" href="<?php echo base_url() ?>index.php/admin/config/edit/<?php echo $row->id_config; ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>

													<a class="red" href="<?php echo base_url(); ?>index.php/admin/config/delete/<?php echo $row->id_config; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?');">
														<i class="ace-icon fa fa-trash-o bigger-130"></i>
													</a>
												</div>
											</td>

									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>


						<div id="foto" class="tab-pane fade">
							<div class="row">
								<?php
								foreach ($foto_header->result() as $row) {
								?>
									<div class="col-sm-4">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Logo Header</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="user-profile-1" class="user-profile row">
														<div class="center">
															<span class="profile-picture">
																<img src="<?php echo base_url('uploads/web/' . $row->content); ?>" class="editable img-responsive" width="200" height="200" />
																<br>
															</span>
														</div>
													</div>

													<div class="space-4"></div>

													<div class="form-group">
														<form class="form-horizontal" method="POST" action="<?php echo site_url('admin/config/ubah_foto'); ?>" enctype="multipart/form-data">
															<div class="col-xs-12">
																<input type="hidden" name="id_config" id="id_config" value="<?php echo $row->id_config; ?>">
																<!-- #section:custom/file-input -->
																<input type="file" id="konten" name="konten" />
																<span class="help-block">Format harus jpg atau png. Maksimal ukuran 1 Mb.</span>

															</div>
															<div class="text-center">
																<button id="submit" name="submit" type="submit" class="btn btn-sm btn-success">
																	Simpan
																	<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																</button>
															</div>
														</form>
													</div>

												</div>
											</div>

										</div>
									</div>
								<?php } ?>

								<?php
								foreach ($foto_kepsek->result() as $row) {
								?>
									<div class="col-sm-4">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Foto Pimpinan</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="user-profile-1" class="user-profile row">
														<div class="center">
															<span class="profile-picture">
																<img src="<?php echo base_url('uploads/web/' . $row->content); ?>" class="editable img-responsive" width="200" height="200" />
																<br>
															</span>
														</div>
													</div>

													<div class="space-4"></div>

													<div class="form-group">
														<form class="form-horizontal" method="POST" action="<?php echo site_url('admin/config/ubah_foto'); ?>" enctype="multipart/form-data">
															<div class="col-xs-12">
																<input type="hidden" name="id_config" id="id_config" value="<?php echo $row->id_config; ?>">
																<!-- #section:custom/file-input -->
																<input type="file" id="konten" name="konten" />
																<span class="help-block">Format harus jpg atau png. Maksimal ukuran 1 Mb.</span>

															</div>
															<div class="text-center">
																<button id="submit" name="submit" type="submit" class="btn btn-sm btn-success">
																	Simpan
																	<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																</button>
															</div>
														</form>
													</div>

												</div>
											</div>

										</div>
									</div>
								<?php } ?>

							</div>
						</div>

						<div id="slider" class="tab-pane fade">
							<div class="row">
								<?php
								foreach ($foto_slider1->result() as $row) {
								?>
									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Slider 1</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="user-profile-1" class="user-profile row">
														<div class="center">
															<span class="profile-picture">
																<img src="<?php echo base_url('uploads/web/' . $row->content); ?>" class="editable img-responsive" width="200" height="200" />
																<br>
															</span>
														</div>
													</div>

													<div class="space-4"></div>

													<div class="form-group">
														<form class="form-horizontal" method="POST" action="<?php echo site_url('admin/config/ubah_foto'); ?>" enctype="multipart/form-data">
															<div class="col-xs-12">
																<input type="hidden" name="id_config" id="id_config" value="<?php echo $row->id_config; ?>">
																<!-- #section:custom/file-input -->
																<input type="file" id="konten" name="konten" />
																<span class="help-block">Format harus jpg atau png. Maksimal ukuran 1 Mb.</span>
																<span class="help-block">Usahakan dimensi gambar 1024 x 720 pixels.</span>

															</div>
															<div class="text-center">
																<button id="submit" name="submit" type="submit" class="btn btn-sm btn-success">
																	Simpan
																	<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																</button>
															</div>
														</form>
													</div>

												</div>
											</div>

										</div>
									</div>
								<?php } ?>

								<?php
								foreach ($foto_slider2->result() as $row) {
								?>
									<div class="col-sm-6">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Slider 2</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="user-profile-1" class="user-profile row">
														<div class="center">
															<span class="profile-picture">
																<img src="<?php echo base_url('uploads/web/' . $row->content); ?>" class="editable img-responsive" width="200" height="200" />
																<br>
															</span>
														</div>
													</div>

													<div class="space-4"></div>

													<div class="form-group">
														<form class="form-horizontal" method="POST" action="<?php echo site_url('admin/config/ubah_foto'); ?>" enctype="multipart/form-data">
															<div class="col-xs-12">
																<input type="hidden" name="id_config" id="id_config" value="<?php echo $row->id_config; ?>">
																<!-- #section:custom/file-input -->
																<input type="file" id="konten" name="konten" />
																<span class="help-block">Format harus jpg atau png. Maksimal ukuran 1 Mb.</span>
																<span class="help-block">Usahakan dimensi gambar 1024 x 720 pixels.</span>

															</div>
															<div class="text-center">
																<button id="submit" name="submit" type="submit" class="btn btn-sm btn-success">
																	Simpan
																	<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																</button>
															</div>
														</form>
													</div>

												</div>
											</div>

										</div>
									</div>
								<?php } ?>

							</div>
						</div>

					</div>
				</div>

				<!-- /section:elements.tab -->
			</div><!-- /.col -->

		</div><!-- /.row -->
	</div>
</div>