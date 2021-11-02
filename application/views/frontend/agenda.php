<!-- Blog posts -->
<section class="main-content blog-posts">
    <div class="container">
        <div class="row">
            <div class="post-wrap">
                <div class="col-md-9">
                    <div class="blog-listing">
                        <?php foreach ($agenda as $a):?>
                            <div class="blog-item">
                                <div class="post-item blog-post-item">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="content-pad">
                                                <div class="blog-thumbnail">
                                                    <div class="item-thumbnail-gallery">
                                                        <div class="item-thumbnail">
                                                           <a href="<?php echo site_url();?>/agenda/lihatagenda/<?=$a['id_agenda']?>">
                                                            <img class="img-fullwidth img-responsive" src="<?php echo base_url();?>uploads/agenda/<?=$a['gambar']?>"> 
                                                            <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                            <div class="thumbnail-hoverlay-cross"></div>
                                                        </a>
                                                    </div>
                                                </div>            
                                            </div><!--/blog-thumbnail-->
                                            <div class="thumbnail-overflow">
                                                
                                                <div class="date-block main-color-2-bg dark-div">
                                                    <?php
                                                    $waktu      = $a['waktu'];
                                                    $pecah      = explode(" ", $waktu);
                                                    $tanggal    = $pecah[0];
                                                    ?>
                                                    <div class="month"><?php echo date("d F Y", strtotime($tanggal)); ?></div>
                                                </div>
                                            </div><!--/thumbnail-overflow-->
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="content-pad">
                                            <div class="item-content">
                                                <h3 class="title"><a href="<?php echo site_url();?>/agenda/lihatagenda/<?=$a['id_agenda']?>"><?=$a['judul_agenda']?> </a></h3>
                                                <div class="item-excerpt blog-item-excerpt">
                                                    <p align="justify"><?php echo character_limiter(strip_tags($a['isi']),300) ?></p>
                                                </div>
                                                
                                                <a class="btn btn-primary no-border" href="<?php echo site_url();?>/agenda/lihatagenda/<?=$a['id_agenda']?>">Selengkapnya <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--/post-item-->
                            </div>
                        </div><!-- /blog-item -->

                    <?php endforeach ?>
                    <?php echo $this->pagination->create_links();?>

                    
                </div><!-- /blog-listing -->
            </div><!-- /col-md-9 -->
            <?php include('sidebar_news.php');?>
        </div>
    </div>
</div>
</section>