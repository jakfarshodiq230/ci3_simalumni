
<section class="main-content blog-posts">
    <div class="container">
        <div class="row">
            <div class="post-wrap">
                <div class="col-md-9">
                    <div class="blog-listing">
                        <div class="blog-item">
                            <div class="post-item blog-post-item">
                                <div class="row">     

                                 <?php
                                 $info = $this->session->flashdata('Info');
                                 if($info!=""){ ?>
                                 <div id="notifikasi" class="alert alert-success"><strong>Sukses ! </strong> <?=$info;?>
                             </div>
                             <?php } ?>
                         </div><!--/post-item-->
                     </div>
                 </div><!-- /blog-item -->
                 
             </div><!-- /blog-listing -->
         </div><!-- /col-md-9 -->
         <?php include('sidebar_news.php');?>
     </div>
 </div>
</div>
</section>