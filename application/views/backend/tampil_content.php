<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/charts/echarts/bars_tornados.js"></script>

<?php
$data = $this->session->flashdata('sukses');
if ($data != "") { ?>
    <div class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
<?php } ?>

<?php
$data2 = $this->session->flashdata('error');
if ($data2 != "") { ?>
    <div class="alert alert-danger"><strong> Error! </strong> <?= $data2; ?></div>
<?php } ?>

<div id="notifikasi" class="alert alert-success fade in">
    <?php
    $adm = $this->session->userdata('id');
    $qu = $this->db->query("SELECT * from admin where id='$adm'")->row_array(); ?>

    <i class="ace-icon fa fa-check green"></i>
    Selamat Datang <span class="green"><strong><?php echo $qu['nama']; ?></strong></span> di
    <strong class="green">
        Halaman Admin
        <small>(v1.0)</small>
    </strong>,
    Sistem Informasi Pengolahan Data ALUMNI STKIP 'AISYIYAH RIAU.
</div>

<div class="row">
    <div class="space-6"></div>

    <div class="col-sm-12 infobox-container">
        <div class="infobox infobox-green">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-comments"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?php echo $jml_testi ?></span>
                <div class="infobox-content">Testimoni</div>
            </div>
        </div>

        <div class="infobox infobox-blue">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-user"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?php echo $jml_alumni ?></span>
                <div class="infobox-content">Alumni</div>
            </div>
        </div>
        <div class="infobox infobox-brown">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-briefcase"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?php echo $hitung_kerja ?></span>
                <div class="infobox-content">Alumni Bekerja</div>
            </div>
        </div>

        <div class="infobox infobox-red">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-child "></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?php echo $hitung_nganggur ?></span>
                <div class="infobox-content">Alumni Nganggur</div>
            </div>
        </div>

        <div class="infobox infobox-pink">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-tasks"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?php echo $jml_berita ?></span>
                <div class="infobox-content">Berita</div>
            </div>
        </div>

        <div class="infobox infobox-red">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-calendar"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?php echo $jml_agenda ?></span>
                <div class="infobox-content">Agenda</div>
            </div>
        </div>

        <div class="infobox infobox-orange">
            <div class="infobox-icon">
                <i class="ace-icon fa fa-image"></i>
            </div>

            <div class="infobox-data">
                <span class="infobox-data-number"><?php echo $jml_foto ?></span>
                <div class="infobox-content">Galeri</div>
            </div>
        </div>

        <div class="space-6"></div>

    </div>

    <div class="vspace-12-sm"></div>


</div><!-- /.row -->

<div class="hr hr32 hr-dotted"></div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="img-responsive">
                <div id="chart1"></div>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="img-responsive">
                <div id="chart3"></div>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url('/assets/jquery-1.7.2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/modules/exporting.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/themes/sand-signika.js'); ?>"></script>
<?php
foreach ($chart_tahun->result_array() as $row) {
    $tahun[] = $row['tahun_lulus'];
    $output[] = (int) $row['hasil'];
}
?>

<?php
foreach ($chart_jk->result_array() as $row) {
    $jk[] = $row['jenis_kelamin'];
    $output2[] = (int) $row['hasil'];
}
?>

<?php
foreach ($chart_asrama->result_array() as $row) {
    $jur[] = $row['nama_asrama'];
    $output3[] = (int) $row['hasil'];
}
?>

<script type="text/javascript">
    jQuery(function() {
        new Highcharts.Chart({
            chart: {
                renderTo: 'chart1',
                type: 'column',
            },
            title: {
                text: 'Jumlah Alumni Berdasarkan Tahun Lulus',
                x: -20
            },
            xAxis: {
                categories: <?php echo json_encode($tahun); ?>
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            series: [{
                name: 'Tahun Lulus',
                data: <?php echo json_encode($output); ?>
            }]
        });
    });
</script>


<script type="text/javascript">
    jQuery(function() {
        new Highcharts.Chart({
            chart: {
                renderTo: 'chart3',
                type: 'column',
            },
            title: {
                text: 'Jumlah Alumni Berdasarkan Jurusan',
                x: -20
            },
            xAxis: {
                categories: <?php echo json_encode($jur); ?>
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            series: [{
                name: 'jurusan',
                data: <?php echo json_encode($output3); ?>
            }]
        });
    });
</script>