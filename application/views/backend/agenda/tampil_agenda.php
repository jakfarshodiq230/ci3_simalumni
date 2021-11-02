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
	<a href="<?php echo base_url();?>index.php/admin/agenda/tambah" class="btn btn-success btn-xs"><i class="ace-icon fa fa-plus"></i> Tambah Data</a>
</div>

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Tanggal</th>
			<th>Jam</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 
			$no = 1;
			foreach ($data->result() as $row) { 
				$waktu = $row->waktu;
				$pecah 		= explode(" ", $waktu);
				$tanggal = $pecah[0];
				$jam	 = $pecah[1];
				?>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row->judul_agenda; ?></td>
				<td><?php echo date("d F Y", strtotime($tanggal)); ?></td>
				<td><?php echo $jam; ?></td>
				<td>
					<div class="hidden-sm hidden-xs action-buttons">

						<a class="green" href="<?php echo base_url()?>index.php/admin/agenda/edit/<?php echo $row->id_agenda; ?>">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>

						<a class="red" href="<?php echo base_url();?>index.php/admin/agenda/delete/<?php echo $row->id_agenda;?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					</div>
				</td>

		</tr>
		<?php }?>
	</tbody>	
</table>