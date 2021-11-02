
<div id="page-content" action="<?php echo base_url();?>index.php/admin/album/lihatgaleri">
	<ul class="ace-thumbnails clearfix">
		<?php
		foreach ($data->result() as $row) {
			?>
			<li>
				<a href="<?php echo base_url().'uploads/galeri/'.$row->gambar; ?>" target="_blank" data-rel="colorbox">

					<?php $img = ['src' => 'uploads/galeri/' . $row->gambar,'width'=>'150', 'height'=>'150'];
					echo img($img)?>
					
					<div class="text">
						<div class="inner"><?php echo $row->judul; ?></div>
					</div>
				</a>

				<div class="tools tools-bottom">

					<a href="<?php echo base_url();?>index.php/admin/galeri/delete/<?php echo $row->id_galeri;?>" onclick="return confirm('Anda yakin akan menghapus data ini?');">
						<i class="ace-icon fa fa-times red"></i>
					</a>
				</div>
			</li>
			<?php } ?>	
		</ul>
	</div>