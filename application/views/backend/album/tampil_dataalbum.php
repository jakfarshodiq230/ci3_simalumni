<?php
$info = $this->session->flashdata('Info');
if($info!=""){ ?>
<div id="notifikasi" class="alert alert-success"><strong>Sukses ! </strong> <?=$info;?>
</div>
<?php } ?>

<div class="table-header">
	<a href="<?php echo base_url();?>index.php/admin/album/tambah" class="btn btn-success btn-xs"><i class="ace-icon fa fa-plus"></i> Tambah Album</a>
</div>

<div>
	<ul class="team-list">
		<?php
		foreach ($data->result() as $row) {
			?>
			<div class="col-md-2">
				<div class="btn-group">
					<a href="<?php echo base_url()?>index.php/admin/album/lihatgaleri/<?php echo $row->id_album;?>" title="<?php echo $row->nama_album; ?>" class="btn btn-app btn-danger">
						<i class="ace-icon fa fa-camera-retro bigger-230"></i>
						<?php echo $row->nama_album; ?>
					</a>

					<button data-toggle="dropdown" class="btn btn-app btn-success btn-xs dropdown-toggle">
						<span class="bigger-110 ace-icon fa fa-caret-down icon-only"></span>
					</button>

					<ul class="dropdown-menu dropdown-primary">
						<li>
							<a href="<?php echo base_url();?>index.php/admin/galeri/tambah/<?php echo $row->id_album;?>">Tambah Foto</a>
						</li>

						<li>
							<a href="<?php echo base_url()?>index.php/admin/album/edit/<?php echo $row->id_album; ?>">Edit</a>
						</li>

						<li>
							<a href="<?php echo base_url();?>index.php/admin/album/delete/<?php echo $row->id_album;?>" onclick="return confirm('Anda yakin akan menghapus Album ini?');">Hapus</a>
						</li>
					</ul>
				</div>
			</div>
			<?php } ?>
		</ul> 
	</div>