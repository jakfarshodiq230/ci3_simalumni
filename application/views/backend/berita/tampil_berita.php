<script type="text/javascript">
jQuery(function($) {
	var oTable1 = 
	$('#dynamic-table')
	.dataTable( {
		bAutoWidth: false,
		"aoColumns": [
		{ "bSortable": false },
		null, null, null,
		{ "bSortable": false }
		],
		"aaSorting": [],
	} );
})
</script>

<?php
$info = $this->session->flashdata('Info');
if($info!=""){ ?>
<div id="notifikasi" class="alert alert-success"><strong>Sukses ! </strong> <?=$info;?>
</div>
<?php } ?>

<?php 
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div id="notifikasi" class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>

<div class="table-header">
	<a href="<?php echo base_url();?>index.php/admin/berita/tambah" class="btn btn-success btn-xs"><i class="ace-icon fa fa-plus"></i> Tambah Data</a>
</div>

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Penulis</th>
			<th>Tanggal</th>
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
				<td><?php echo $row->judul_berita; ?></td>
				<td><?php echo $row->penulis; ?></td>
				<td><?php echo $row->tanggal; ?></td>
				<td>
					<div class="hidden-sm hidden-xs action-buttons">

						<a class="green" href="<?php echo base_url()?>index.php/admin/berita/edit/<?php echo $row->id_berita; ?>">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>

						<a class="red" href="<?php echo base_url();?>index.php/admin/berita/delete/<?php echo $row->id_berita;?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
				</td>
			
		</tr>
		<?php }?>
	</tbody>	
</table>
