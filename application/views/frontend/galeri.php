<!-- Blog posts -->
<section class="main-content blog-posts">
    <div class="container">
        <div class="row">
            <div class="post-wrap">
                <div class="col-md-9">
                    <div class="blog-listing">

                        <section class="flat-row padding-small-v1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="project-listing">
                                            <ul class="filter-cat v1">
                                                <li class="active">
                                                    <a data-filter="*" href="#" class="flat-button">
                                                        Tampilkan Semua
                                                    </a>
                                                </li>

                                                <?php foreach ($album as $a):?>
                                                    <li>
                                                        <a data-filter=".<?php echo $a['nama_album'];?>" href="#<?php echo $a['nama_album'];?>" class="flat-button"><?php echo $a['nama_album'];?>
                                                            
                                                        </a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                            <hr>
                                            <div class="project-portfolio">
                                                <?php foreach ($galeri as $g):?>
                                                    <div class="item <?php echo $g['nama_album'];?>">
                                                        <div class="project-item">
                                                            <div class="item-thumbnail">
                                                                <a href="<?php echo base_url().'uploads/galeri/'.$g['gambar']; ?>" target="_blank" data-rel="colorbox">
                                                                    <img src="<?php echo base_url();?>uploads/galeri/<?=$g['gambar'] ?>" class="img-circle" title="<?=$g['judul']?>"/>
                                                                </a>
                                                                
                                                            </div><!-- /item-thumbnail -->
                                                        </div><!-- /project-item -->
                                                    </div><!-- /item -->

                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div><!-- /blog-listing -->   
                    </div><!-- /col-md-9 -->
                    <?php include('sidebar_news.php');?>
                </div>
            </div>
        </div>
    </section>