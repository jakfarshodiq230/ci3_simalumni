<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<link rel="icon" href="favicon.png" type="image/gif">

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title><?=$title ?></title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css" />
    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/web/stylesheets/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/web/stylesheets/responsive.css">

    <!-- Colors -->


    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/web/stylesheets/animate.css">

    <!-- Favicon and touch icons  -->
    <link href="<?php echo base_url();?>assets/web/icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="<?php echo base_url();?>assets/web/icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/logo.png">

    <link href="#" rel="shortcut icon">

    <link type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">

</head>

<body class="header-sticky">

    <div class="boxed">

        <div class="menu-hover">
            <div class="btn-menu">
                <span></span>
            </div><!-- //mobile menu button -->
        </div>

        <div class="header-inner-pages">
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar menu-top">
                                <ul class="menu">

                                    <li class="home"><a target="_blank">Santun, Islami, Mandiri, Peduli, Aktif, Tanggung Jawab, Ilmiah, Kreatif+62 761-39911+62 853-5590-2657
                                    stkipaisyiyahriau@yahoo.co.id</a></li>

                                </ul><!-- /.menu -->
                            </nav><!-- /.mainnav -->

                            <div class="navbar-right topnav-sidebar">
                                <ul class="m">

                                    <?php
                                    $adm=$this->session->userdata('id');
                                    $qu=$this->db->query("SELECT * from alumni where id='$adm'")->row_array(); ?>

                                    <?php if ($this->session->userdata('id')): ?>

                                        <li class="textwidget">
                                            <?php
                                            $img = $qu['foto'];
                                            if(empty($img)){ ?>
                                            <img class="img-circle" src="<?php echo base_url('assets/web/images/no_photo.png'); ?>" style="max-height:30px">
                                            <?php } else { ?>
                                            <img class="img-circle" src="<?php echo base_url('uploads/alumni/'.$qu['foto']); ?>" style="max-height:30px">
                                            <?php } ?>

                                            <a href="<?php echo site_url('alumni/profile_alumni'); ?>"> <?php echo $qu['nama_lengkap']; ?></a>
                                        </li>

                                        <li class="textwidget">
                                            <a href="<?php echo site_url('login/logout'); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');"><i class="Home"></i><i class="fa fa-sign-out"> Logout</i></a>
                                        </li>
                                    <?php else: ?>
                                        <li class="textwidget"><a href="<?php echo site_url('frontend/login'); ?>"><i class="Home"></i><i class="fa fa-lock"></i> Login</i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div><!-- col-md-12 -->
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- Top -->
        </div><!-- header-inner-pages -->

        <!-- Header -->
        <header id="header" class="header">
            <div class="header-wrap">
                <div class="container">
                    <div class="header-wrap clearfix">
                        <div id="logo" class="logo">
                            <a href="<?php echo site_url(''); ?>" rel="home">
                                <img src="<?php echo base_url();?>uploads/web/<?=$logo ?>">
                            </a>
                        </div>


                        <div class="nav-wrap">

                            <nav id="mainnav" class="mainnav">
                                <ul class="menu">
                                    <li><a href='<?php echo site_url(''); ?>'>Home
                                        <span class="menu-description">Beranda</span></a>
                                    </li>

                                    <li><a class="dropdown-toggle" data-toggle="dropdown" href='#'>Tentang Kami
                                        <span class="menu-description">About us</span></a>
                                        <ul class="submenu">
                                            <li class="blue"><a href="<?php echo site_url('frontend/viewpageHumas'); ?>">Sejarah</a></li>
                                            <li class="blue"><a href="<?php echo site_url('frontend/viewpageSosial'); ?>">Visi & Misi</a></li>
                                            <li class="blue"><a href="<?php echo site_url('frontend/viewpagePendidikan'); ?>">Kelembagaan</a></li>
                                            <li class="blue"><a href="<?php echo site_url('frontend/viewpageKaderisasi'); ?>">Program Study</a></li>
                                        </ul>
                                    </li>

                                    <li><a class="dropdown-toggle" data-toggle="dropdown" href='#'>Informasi
                                        <span class="menu-description">STKIP 'AISYIYAH RIAU</span></a>
                                        <ul class="submenu">
                                            <?php if ($this->session->userdata('id')): ?>
                                                <li class="blue"><a href="<?php echo site_url('alumni');?>">Data Alumni</a></li>
                                            <?php else: ?>

                                            <?php endif; ?>
                                            <li class="blue"><a href="<?php echo site_url('berita');?>">Berita</a></li>
                                            <li class="blue"><a href="<?php echo site_url('agenda');?>">Agenda</a></li>
                                            <li class="blue"><a href="<?php echo site_url('statistik');?>">Statistik</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="<?php echo site_url('galeri');?>">Galeri
                                        <span class="menu-description">Alumni</span></a>
                                    </li>
                                    
                                </ul><!-- /.menu -->
                            </nav><!-- /.mainnav -->

                        </div><!-- /.nav-wrap -->
                    </div><!-- /.header-wrap -->
                </div><!-- /.container-->
            </div><!-- /.header-wrap-->
        </header><!-- /.header -->
