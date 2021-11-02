<ul class="nav nav-list">
    <li class="active">
        <a href="<?php echo site_url(); ?>/admin/home">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>

        <b class="arrow"></b>
    </li>

    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-users"></i>
            <span class="menu-text"> Master Alumni </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li class="">
                <a href="<?php echo site_url(); ?>/admin/alumni">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Data Alumni
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="<?php echo site_url(); ?>/admin/asrama">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Jurusan
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>

    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-info-circle"></i>
            <span class="menu-text"> Informasi </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li class="">
                <a href="<?php echo site_url(); ?>/admin/agenda">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Agenda
                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo site_url(); ?>/admin/berita">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Berita
                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo site_url(); ?>/admin/komentar">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Komentar
                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo site_url(); ?>/admin/testimoni">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Testimoni
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>

    <li class="">
        <a href="<?php echo site_url('admin/album'); ?>">
            <i class="menu-icon fa fa-camera"></i>
            <span class="menu-text"> Album </span>
        </a>

        <b class="arrow"></b>
    </li>

    <li class="">
        <a href="<?php echo site_url(); ?>/claporanpdf">
            <i class="menu-icon fa fa-book"></i>
            <span class="menu-text"> Laporan </span>
        </a>

        <b class="arrow"></b>
    </li>

    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-cogs"></i>
            <span class="menu-text"> Pengaturan </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li class="">
                <a href="<?php echo site_url(); ?>/admin/config">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Config
                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="<?php echo site_url(); ?>/admin/config/ubah_profile">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Ubah Profile
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>

    <li class="">
        <a href="<?php echo site_url(); ?>/login/logout" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');">
            <i class="menu-icon fa fa-sign-out"></i>
            <span class="menu-text"> Logout </span>
        </a>

        <b class="arrow"></b>
    </li>

</ul><!-- /.nav-list -->