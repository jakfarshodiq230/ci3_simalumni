<?php
$adm=$this->session->userdata('id');
$qu=$this->db->query("SELECT * from admin where id='$adm'")->row_array(); ?>

<div id="navbar" class="navbar navbar-default">
	<script type="text/javascript">
	try{ace.settings.check('navbar' , 'fixed')}catch(e){}
</script>

<div class="navbar-container" id="navbar-container">
	<!-- #section:basics/sidebar.mobile.toggle -->
	<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
		<span class="sr-only">Toggle sidebar</span>

		<span class="icon-bar"></span>

		<span class="icon-bar"></span>

		<span class="icon-bar"></span>
	</button>

	<div class="navbar-header pull-left">
		<a href="#" class="navbar-brand">
			<small>
				<img src="<?php echo base_url();?>assets/web/images/aisyiyah.png" weight="35" height="25" />
				Halaman Admin Alumni STKIP 'AISYIYAH RIAU.
			</small>
		</a>

	</div>

	<!-- #section:basics/navbar.dropdown -->

	<div class="navbar-buttons navbar-header pull-right" role="navigation">
		<ul class="nav ace-nav">

			<!-- #section:basics/navbar.user_menu -->
			<li class="green">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
					<span class="badge badge-success">
						<?php

						$count=$this->db->query("SELECT count(id_testimoni)as jum from testimoni where publish='Tidak'");
						foreach($count->result() as $row) {
							echo "" . $row->jum . "";

							?>
						</span>
					</a>

					<ul class="dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="ace-icon fa fa-exclamation-triangle"></i>
							<?php echo $row->jum ?> Buku Tamu belum di verifikasi
							<?php } ?>
						</li>

						<li class="dropdown-content">
							<ul class="dropdown-menu dropdown-navbar navbar-green">
								<?php

								$kom=$this->db->query("SELECT *  from testimoni where publish='Tidak'");
								foreach($kom->result() as $row) {

									?>
									<li>
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-green fa fa-comment"></i>
												<?php echo character_limiter(strip_tags($row->isi_testimoni),15); ?>
											</span>
										</div>
									</li>
									<?php } ?>

								</ul>
							</li>

							<li class="dropdown-footer">
								<a href="<?php echo site_url('admin/testimoni');?>">
									Lihat semua Buku Tamu
									<i class="ace-icon fa fa-arrow-right"></i>
								</a>
							</li>
						</ul>
					</li>

					<li class="purple">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<i class="ace-icon fa fa-bell icon-animated-bell"></i>
							<span class="badge badge-important">
								<?php

								$count=$this->db->query("SELECT count(ID)as jum from komentar where publish='Tidak'");
								foreach($count->result() as $row) {
									echo "" . $row->jum . "";

									?>
								</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									<?php echo $row->jum ?> Komentar belum di verifikasi
									<?php } ?>
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<?php

										$kom=$this->db->query("SELECT *  from komentar join alumni ON alumni.id=komentar.id where publish='Tidak'");
										foreach($kom->result() as $row) {

											?>
											<li>
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														<?php echo character_limiter(strip_tags($row->komen),15); ?>
													</span>
												</div>
											</li>
											<?php } ?>

										</ul>
									</li>

									<li class="dropdown-footer">
										<a href="<?php echo site_url('admin/komentar');?>">
											Lihat semua komentar
											<i class="ace-icon fa fa-arrow-right"></i>
										</a>
									</li>
								</ul>
							</li>

							<li class="light-blue">
								<a data-toggle="dropdown" data-hover="dropdown" data-close-others="true" href="#" class="dropdown-toggle">
									<img weight="40" height="40" class="img-circle" src="<?php echo base_url('uploads/foto_user/'.$qu['foto']); ?>" alt="" />
									<span class="username">
										<?php echo $qu['nama']; ?>
									</span>
									<i class="fa fa-angle-down" aria-hidden="true"></i>
								</a>

								<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
									<li>
										<a href="<?php echo site_url();?>/admin/config/ubah_profile" >
											<i class="ace-icon fa fa-cog"></i>
											Ubah Profile
										</a>
									</li>

									<li>
										<a href="<?php echo site_url();?>/frontend" target="_blank">
											<i class="ace-icon fa fa-desktop"></i>
											Lihat Website
										</a>
									</li>

									<li>
										<a href="<?php echo site_url();?>/login/logout" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');">
											<i class="ace-icon fa fa-sign-out"></i>
											Logout
										</a>
									</li>

								</ul>
							</li>

							<!-- /section:basics/navbar.user_menu -->
						</ul>
					</div>

					<!-- /section:basics/navbar.dropdown -->
				</div><!-- /.navbar-container -->
			</div>
