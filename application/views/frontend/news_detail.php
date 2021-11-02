<!-- Blog posts -->
<section class="main-content blog-single">
    <div class="container">
        <div class="row">
            <div class="post-wrap">
                <div class="col-md-9">
                    <article class="post">
                        <div class="entry-wrapper">
                            <div class="entry-box">
                                <img class="img-fullwidth img-responsive" src="<?php echo base_url();?>uploads/berita/<?=$images ?>" width="500px" height="350px"> 

                            </div>

                            <div class="post-content">
                                <h2 class="title"></h2>
                                <div class="content-dropcap">
                                    <p align="justify"><?=$content ?></p>
                                </div>
                            </div>

                            <div class="content-pad">
                                <div class="item-content">
                                    <div class="item-meta blog-item-meta">
                                        <span>Tanggal:<span class="sep">|</span> </span>
                                        <span><?=$date ?><span class="sep">|</span> </span>
                                        <span><span class="dot">.</span><?=$author ?></a><span class="sep">|</span></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <?php if ($this->session->userdata('id')): ?>
                            <table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <?php foreach ($komentar as $k):
                              $waktu = $k['waktu'];
                              $pecah      = explode(" ", $waktu);
                              $tanggal = $pecah[0];
                              $jam     = $pecah[1];
                              ?>
                              <tr>
                                <td width="5%" align="left" valign="top"><img class="img-circle" src="<?php echo base_url();?>uploads/alumni/<?=$k['foto']?>"/></td>
                                <td width="85%" align="left" valign="top"> <b><?=$k['nama_lengkap']?></b> | <i><?=date("d F Y", strtotime($tanggal)) ?></i> | <i><?=$jam ?></i><br />
                                <?=$k['komen']?>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left" valign="top"><hr /></td>
                        </tr>
                    <?php endforeach ?>
                </table>
                <hr>

                <?php
                $adm=$this->session->userdata('id');
                $qu=$this->db->query("SELECT * from alumni where id='$adm'")->row_array(); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="contact-form">
                            <div class="line-box"></div>
                            <form action="<?=base_url();?>index.php/berita/simpan_komentar" method="post" id="contactform" class="comment-form" novalidate="">
                                <fieldset class="style-1 id">
                                    <label>Komentar sebagai :</label>
                                    <input type="hidden" name="id" value="<?php echo $qu['id']; ?>"><strong><?php echo $qu['nama_lengkap']; ?></strong>
                                </fieldset>
                                <br>

                                <fieldset class="message-form">
                                    <textarea id="komen" name="komen" class="form-control" required"" rows="5" placeholder="Masukan komentar Anda disini"></textarea>
                                </fieldset>
                                <br>

                                <input id="id_berita" name="id_berita" class="form-control" type="hidden" value="<?=$kode ?>">

                                <input id="publish" name="publish" class="form-control" type="hidden" value="Tidak">

                                <div class="submit-wrap">
                                    <button type="submit" class="btn btn-primary" onClick="window.location.reload()"><i class="ace-icon fa fa-send"></i> Kirim</button>
                                </div>
                            </form>
                        </div><!-- contact-form -->
                    </div><!-- col-md-6 -->
                </div>
            <?php else: ?>
                Anda harus Login terlebih dahulu untuk melihat komentar.
            <?php endif; ?>

        </div><!-- /blog-listing -->
    </div><!-- /col-md-9 -->
    <?php include('sidebar_news.php');?>
</div>
</div>
</div>
</section>
