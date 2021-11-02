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

<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Isi Testimoni</th>
			<th>Publish</th>
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
				<td><?php echo $row->nama; ?></td>
				<td><?php echo character_limiter(strip_tags($row->isi_testimoni),130); ?></td>
				<td><form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/admin/testimoni/edit">
					<input type="hidden" name="id_testimoni" id="id_testimoni" value="<?php echo $row->id_testimoni; ?>">
					<?php
					echo form_dropdown('publish', array('Ya' => 'Ya', 'Tidak' => 'Tidak'), $row->publish, "class='form-control'");
					?>
					<button type="submit" name="submit" class="btn btn-xs btn-success">
						<i class="ace-icon fa fa-check bigger-170"></i>
					</button>
				</form>
			</td>			
			<td>
				<div class="hidden-sm hidden-xs action-buttons">

					<a class="red" href="<?php echo base_url();?>index.php/admin/testimoni/delete/<?php echo $row->id_testimoni;?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?');">
						<i class="ace-icon fa fa-trash-o bigger-130"></i>
					</a>
				</div>
			</td>
		</tr>
		<?php }?>
	</tbody>
	
</table>