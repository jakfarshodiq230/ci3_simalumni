<div class="hr dotted"></div>
<?php
if (!empty($data)) { //JIKA DATA TIDAK KOSONG

    foreach ($data as $row) {
?>
        <div>
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            <?php $img = ['src' => 'uploads/alumni/' . $row->foto, 'width' => '180', 'height' => '200'];
                            echo img($img) ?>
                        </span>

                        <div class="space-4"></div>

                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                            <div class="inline position-relative">
                                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                    <i class="ace-icon fa fa-circle light-green"></i>
                                    &nbsp;
                                    <span class="white"><?php echo $row->nama_lengkap ?></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="space-6"></div>

                    <div class="profile-contact-info">
                        <div class="profile-contact-links align-left">
                            <a href="#" class="btn btn-link">
                                <i class="ace-icon fa fa-phone bigger-120 green"></i>
                                <?php echo $row->telp ?>
                            </a>

                            <a href="#" class="btn btn-link">
                                <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                                <?php echo $row->email ?>
                            </a>
                        </div>
                    </div>

                    <div class="hr hr16 dotted"></div>
                </div>

                <div class="col-xs-12 col-sm-9">
                    <div class="center">

                    </div>

                    <div class="profile-user-info profile-user-info-striped">

                        <div class="profile-info-row">
                            <div class="profile-info-name"> username </div>

                            <div class="profile-info-value">
                                <span class="editable" id="username"><?php echo $row->username ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Nama Lengkap </div>

                            <div class="profile-info-value">
                                <span class="editable" id="nama_lengkap"><?php echo $row->nama_lengkap ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Jenis Kelamin </div>

                            <div class="profile-info-value">
                                <span class="editable" id="jenis_kelamin"><?php echo $row->jenis_kelamin ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Tempat Lahir </div>

                            <div class="profile-info-value">
                                <span class="editable" id="tempat_lahir"><?php echo $row->tempat_lahir ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Tanggal Lahir </div>

                            <div class="profile-info-value">
                                <span class="editable" id="tanggal_lahir"><?php echo $row->tanggal_lahir ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Tahun Lulus </div>

                            <div class="profile-info-value">
                                <span class="editable" id="tahun_lulus"><?php echo $row->tahun_lulus ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Jurusan </div>

                            <div class="profile-info-value">
                                <span class="editable" id="asrama"><?php echo $row->nama_asrama ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Agama </div>

                            <div class="profile-info-value">
                                <span class="editable" id="agama"><?php echo $row->agama ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Status Kerja </div>

                            <div class="profile-info-value">
                                <span class="editable" id="profesi"><?php echo $row->profesi ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Tempat Kerja </div>

                            <div class="profile-info-value">
                                <span class="editable" id="tempat_kerja"><?php echo $row->tempat_kerja ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Provinsi </div>

                            <div class="profile-info-value">
                                <span class="editable" id="provinsi"><?php echo $row->nama_provinsi ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Kota </div>

                            <div class="profile-info-value">
                                <span class="editable" id="kota"><?php echo $row->nama_kabupaten ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Alamat </div>

                            <div class="profile-info-value">
                                <span class="editable" id="alamat"><?php echo $row->alamat ?></span>
                            </div>
                        </div>
                    </div>
                    <br>
                    &nbsp; &nbsp;
                    <a href="<?php echo base_url(); ?>index.php/admin/alumni" class="btn btn-close btn-sm"><i class="ace-icon fa fa-close"></i> Tutup</a>
                    </br>
                </div>
            </div>
        </div>


<?php
    }
} else { //JIKA DATA KOSONG
    echo "Data Belum Lengkap";
}
?>