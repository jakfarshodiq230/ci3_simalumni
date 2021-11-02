<script type="text/javascript">
	jQuery(function($) {
		var oTable1 =
			$('#dynamic-table')
			.dataTable({
				bAutoWidth: false,
				"aoColumns": [{
						"bSortable": false
					},
					null, null, null, null, null,
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

<div style="margin-top:20px">
	<form action="<?php echo base_url(); ?>index.php/excel/import/" method="post" enctype="multipart/form-data">
		<input type="file" name="file" />
		<br>
		<button type="submit" value="Upload file" class="btn btn-primary btn-sm"><i class="ace-icon fa fa-cloud-upload"></i> Import file</button>
		<span class="help-block">File harus berekstensi .xls / .xlsx</span>

		<?php
		$pesan = $this->session->flashdata('Pesan');
		if ($pesan != "") { ?>
			<div id="notifikasi" class="alert alert-success"><strong>Sukses ! </strong> <?= $pesan; ?>
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			</div>
		<?php } ?>

		<?php
		$error = $this->session->flashdata('error');
		if ($error != "") { ?>
			<div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?= $error; ?>
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			</div>
		<?php } ?>
	</form>
</div>

<div class="table-header">
	<a href="<?php echo base_url(); ?>index.php/admin/alumni/tambah" class="btn btn-success btn-xs"><i class="ace-icon fa fa-plus"></i> Tambah Data</a>

	<a href="<?php echo base_url(); ?>index.php/excel/export" class="btn btn-danger btn-sm pull-right"><i class="ace-icon fa fa-cloud-download"></i> Export Data</a>
</div>

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nim</th>
			<th>Nama Lengkap</th>

			<th>Jurusan</th>
			<th>Tahun Lulus</th>
			<th>Status Kerja</th>
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
				<td><?php echo $row->username; ?></td>
				<td><?php echo $row->nama_lengkap; ?></td>

				<td><?php echo $row->nama_asrama; ?></td>
				<td><?php echo $row->tahun_lulus; ?></td>
				<td><?php echo $row->profesi; ?></td>
				<td>
					<div class="hidden-sm hidden-xs action-buttons">

						<a class="blue" href="<?php echo base_url() ?>index.php/admin/alumni/detail_alumni/<?php echo $row->id; ?>">
							<i class="ace-icon fa fa-search-plus bigger-130"></i>
						</a>

						<a class="green" href="<?php echo base_url() ?>index.php/admin/alumni/edit/<?php echo $row->id; ?>">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>

						<a class="red" href="<?php echo base_url(); ?>index.php/admin/alumni/delete/<?php echo $row->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
				</td>
		</tr>
	<?php } ?>
	</tbody>

</table>