<?php
$info = $this->session->flashdata('Info');
if($info!=""){ ?>
<div id="notifikasi" class="alert alert-success"><strong>Sukses ! </strong> <?=$info;?>
</div>
<?php } ?>

<!-- Blog posts -->
<section class="flat-row flat-member-single padding-v1">
    <div class="container">
        <div class="row">
            <div class="member-single">
                <div class="col-md-9">

                   <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="text-center"><h3 class="panel-title" >Sambutan</h3></span>
                    </div>

                    <div class="panel-body">
                        <div class="member-single-post">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="item-thumbnail">
                                        <a href="#"><img src="<?php echo base_url();?>uploads/web/<?=$foto_kepsek ?>" alt="Rektor"></a>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="content-pad">
                                        <div class="item-content">
                                            <h3 class="item-title"><?=$nama_kepsek ?></h3>
                                            <h4 class="small-text"> KETUA STKIP 'AISYIYAH RIAU' </h4>
                                            <div class="member-tax small-text">

                                            </div>
                                            <p align="justify"><?=$sambutan ?></p>

                                        </div>
                                    </div><!--/content-pad-->
                                </div><!--/col-md-8-->
                            </div><!--/row-->
                        </div><!--/member-single-post-->
                    </div>
                </div>
                <br>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="text-center"><h3 class="panel-title" >Agenda</h3></span>
                    </div>

                    <div class="panel-body">

                        <?php foreach ($agenda_terbaru as $a): ?>
                            <div class="flat-icon">
                                <div class="iconbox left v1">
                                    <div class="box-header v1">
                                        <img src="<?php echo base_url('uploads/agenda/'.$a['gambar']);?>" />
                                    </div>
                                    <div class="icon-post">
                                        <div class="box-title">
                                            <a href="<?php echo site_url('agenda/lihatagenda/'.$a['id_agenda']);?>"><?=$a['judul_agenda']?></a>
                                        </div>

                                        <?php
                                        $waktu      = $a['waktu'];
                                        $pecah      = explode(" ", $waktu);
                                        $tanggal    = $pecah[0];
                                        ?>
                                        <i class="fa fa-calendar"></i> <?php echo date("d F Y", strtotime($tanggal)); ?>

                                    </div>

                                </div><!-- /.iconbox -->
                            </div>
                        <?php endforeach ?>
                        <a class="btn btn-primary no-border" href="<?php echo site_url('agenda');?>">Selengkapnya <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="text-center"><h3 class="panel-title" >Galeri</h3></span>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="project-listing">
                                <div class="project-portfolio">
                                   <?php foreach ($galeri as $g): ?>
                                    <div class="item">
                                        <div class="project-item">
                                            <div class="item-thumbnail">
                                                <a href="<?php echo base_url('uploads/galeri/'.$g['gambar']);?>" target="_blank">
                                                    <img src="<?php echo base_url('uploads/galeri/'.$g['gambar']);?>" class="img-circle" title="<?php echo $g['judul']; ?>">
                                                </a>
                                            </div><!-- /item-thumbnail -->

                                        </div><!-- /project-item -->
                                    </div><!-- /item -->
                                <?php endforeach ?>
                            </div>
                            <a class="btn btn-primary no-border" href="<?php echo site_url('galeri');?>">Selengkapnya <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>

        </div><!-- /row -->
        <?php include('sidebar_home.php');?>
    </div>
</div>
</div>
</section>

<section class="flat-row full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-reviews">
                    <div class="flat-causes">
                        <div class="featured-causes" data-item="3" data-nav="false"
                        data-dots="false" data-auto="false">
                        <?php foreach ($testimoni as $j):?> <div class="item">
                            <div class="text">
                                <p><?=$j['isi_testimoni']?></p>
                            </div>

                            <div class="title-testimonial">
                                <div class="thumb-title">
                                    <img src="<?php echo base_url('uploads/testimoni/'.$j['foto']);?>" />
                                </div>
                                <div class="post-title">
                                    <h6 class="title-post"><?=$j['nama']?></h6>
                                    <span><?=$j['keterangan']?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section><!-- /flat-row -->
