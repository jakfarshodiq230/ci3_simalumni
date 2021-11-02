<script type="text/javascript">
jQuery(function($) {
	var oTable1 = 
	$('#dynamic-table')
	
	.dataTable( {
		bAutoWidth: false,
		"aoColumns": [
		
		null, null, null, null, null,
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
			<th>Tanggal</th>
			<th>Jam</th>
			<th>Komentar</th>
			<th>Publish</th>
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
				<td><?php echo date("d F Y", strtotime($tanggal)); ?></td>
				<td><?php echo $jam; ?></td>
				<td><?php echo character_limiter(strip_tags($row->komen),130); ?></td>
				<td><form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/admin/komentar/simpan">
					<input type="hidden" name="id_komentar" id="id_komentar" value="<?php echo $row->id_komentar; ?>">
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

					<a class="red" href="<?php echo base_url();?>index.php/admin/komentar/delete/<?php echo $row->id_komentar;?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?');">
						<i class="ace-icon fa fa-trash-o bigger-130"></i>
					</a>

				</div>
			</td>
			
		</tr>
		<?php }?>
	</tbody>
	
</table>
