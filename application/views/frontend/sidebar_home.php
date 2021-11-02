
<div class="member-single">
    <div class="col-md-3">

        <div class="sidebar">
            <?php if ($this->session->userdata('id')): ?>

            <?php else: ?>
                
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="text-center"><h3 class="panel-title" >Login</h3></span>
                    </div>

                    <div class="panel-body">
                        
                        <form action="<?=base_url();?>index.php/login/login" method="post" class="login-form" novalidate="">                            
                            <fieldset class="style-1 username">
                                <input type="text" name="username" placeholder="Username Anda" id="username" class="form-control" required="">
                            </fieldset>
                            
                            <fieldset class="style-1 password">
                                <input type="password" name="pass" placeholder="Password Anda" id="pass" class="form-control" required="">
                            </fieldset> 

                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ace-icon fa fa-key"></i> Login
                                </button>
                                <span><a href="<?php echo site_url('frontend/login'); ?>">/ Daftar</a></span>
                            </div>
                            
                        </form> 
                    </div>
                <?php endif; ?>
            </div>
            
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
                                        <a href="#"><i class="fa fa-caret-right"></i> <?=$b['judul_berita']?></a>
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
                        <span class="text-center"><h3 class="panel-title" >Buku Tamu</h3></span>
                    </div>
                    
                    <div class="panel-body">

                        <form action="<?=base_url();?>index.php/admin/testimoni/simpan" method="post" novalidate="" enctype="multipart/form-data">      
                            <input type="hidden" name="publish" value="Tidak">    
                            
                            <fieldset class="style-1 nama">
                                <input id="nama" name="nama" class="form-control" type="text" placeholder="Nama Anda" required>
                            </fieldset>
                            
                            <fieldset class="message-form">
                                <textarea id="isi_testimoni" name="isi_testimoni" class="form-control" placeholder="Masukan pesan atau komentar Anda disini" required></textarea>
                            </fieldset>
                            <label>Foto Anda</label>
                            <fieldset class="style-1 foto">
                                <input id="foto" name="foto" class="form-control" type="file" required>
                            </fieldset> 
                            <br>

                            <fieldset class="style-1 keterangan">
                                <input id="keterangan" name="keterangan" class="form-control" type="text" placeholder="Profesi/Jabatan kerja" required>
                            </fieldset> 
                            
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ace-icon fa fa-send"></i> Kirim</span>
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>    
            </div>

            <div class="sidebar">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <span class="text-center"><h3 class="panel-title" >Tautan</h3></span>
                    </div>
                    
                    <div class="panel-body">
                        <div class="btn-group">
                            <a href="" class="btn btn-default" target="_blank">
                                <i class="ace-icon fa fa-facebook"></i> Facebook
                            </a>
                        </div>

                        <div class="btn-group">
                            <a href="" class="btn btn-default" target="_blank">
                                <i class="ace-icon fa fa-info"></i> Instagram
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

