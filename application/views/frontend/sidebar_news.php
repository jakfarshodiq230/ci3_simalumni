<div class="col-md-3">
   <div class="sidebar">
    <div class="panel panel-info">
        <div class="panel-heading">
            <span class="text-center"><h3 class="panel-title" >Berita Terbaru</h3></span>
        </div>
        
        <div class="panel-body">
            <ul class="recent-posts clearfix">
                <?php foreach ($berita_terbaru as $b):?>
                    <li>
                        <div class="text">
                            <a href="<?php echo site_url();?>/berita/lihatberita/<?=$b['id_berita']?>"><i class="fa fa-caret-right"></i> <?=$b['judul_berita']?></a>
                        </div>
                    </li>
                    <br>
                <?php endforeach ?>
                <a class="btn btn-primary no-border" href="<?php echo site_url('berita');?>">Selengkapnya <i class="fa fa-angle-right"></i></a>
            </ul>
        </div>
    </div>
</div>

<div class="sidebar">
    <div class="panel panel-info">
        <div class="panel-heading">
            <span class="text-center"><h3 class="panel-title" >Agenda Terbaru</h3></span>
        </div>
        
        <div class="panel-body">
            <ul class="recent-posts clearfix">
                <?php foreach ($agenda_terbaru as $a):?>
                    <li>
                        <div class="text">
                            <a href="<?php echo site_url();?>/agenda/lihatagenda/<?=$a['id_agenda']?>"><i class="fa fa-caret-right"></i> <?=$a['judul_agenda']?></a>
                        </div>
                    </li>
                    <br>
                <?php endforeach ?>
                <a class="btn btn-primary no-border" href="<?php echo site_url('agenda');?>">Selengkapnya <i class="fa fa-angle-right"></i></a>
            </ul>
        </div>
    </div>
</div>

</div>




