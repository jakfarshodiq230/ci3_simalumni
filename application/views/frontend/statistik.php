<section class="main-content contact-posts">
    <div class="container">

        <div class="row">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-sm-7">
                        <!-- #section:elements.tab -->
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">

                                <li>
                                    <a data-toggle="tab" href="#jk">
                                        <i class="green ace-icon fa fa-bar-chart-o bigger-120"></i>
                                        Jenis Kelamin
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#asrama">
                                        <i class="green ace-icon fa fa-bar-chart-o bigger-120"></i>
                                        Jurusan
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#tahun_lulus">
                                        <i class="green ace-icon fa fa-bar-chart-o bigger-120"></i>
                                        Tahun Lulus
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="jk" class="tab-pane fade in active">
                                    <br>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="img-responsive">
                                                <div id="chart2"></div>
                                                <br>
                                                <br>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="asrama" class="tab-pane fade">
                                    <br>
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

                                <div id="tahun_lulus" class="tab-pane fade">
                                    <br>
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

                            </div>
                        </div>

                        <!-- /section:elements.tab -->
                    </div><!-- /.col -->

                    <div class="col-sm-5">
                        <!-- #section:elements.tab -->
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active">
                                    <a data-toggle="tab" href="#kerja">
                                        <i class="green ace-icon fa fa-info-circle bigger-120"></i>
                                        Pemetaan Alumni
                                    </a>
                                </li>

                                <li>
                                    <a data-toggle="tab" href="#profesi">
                                        <i class="green ace-icon fa fa-user bigger-120"></i>
                                        Profesi Alumni
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="kerja" class="tab-pane fade in active">
                                    <br>
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr style="background: #62bde5;">
                                                <th><b>No</b></th>
                                                <th><b>Provinsi</b></th>
                                                <th><b>Jumlah</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $no = 1;
                                                foreach ($provinsi as $row) {
                                                    $prov = $row['nama_provinsi'];
                                                    $jml = (int) $row['hasil'];
                                                ?>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $prov ?></td>
                                                    <td><?php echo $jml ?></td>
                                            </tr>

                                        </tbody>
                                    <?php } ?>
                                    </table>
                                </div>

                                <div id="profesi" class="tab-pane fade">
                                    <br>
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr style="background: #62bde5;">
                                                <th><b>No</b></th>
                                                <th><b>Profesi</b></th>
                                                <th><b>Jumlah</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $no = 1;
                                                foreach ($profesi as $row) {
                                                    $prof = $row['tempat_kerja'];
                                                    $jml = (int) $row['hasil'];
                                                ?>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $prof; ?></td>
                                                    <td><?php echo $jml ?></td>
                                            </tr>

                                        </tbody>
                                    <?php } ?>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <!-- /section:elements.tab -->
                    </div><!-- /.col -->
                </div><!-- /.row -->


            </div>
        </div><!-- /.row -->


    </div>
</section>

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
                renderTo: 'chart2',
                type: 'column',
            },
            title: {
                text: 'Jumlah Alumni Berdasarkan Jenis Kelamin',
                x: -20
            },
            xAxis: {
                categories: <?php echo json_encode($jk); ?>
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            series: [{
                name: 'Jenis Kelamin',
                data: <?php echo json_encode($output2); ?>
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
                name: 'asrama',
                data: <?php echo json_encode($output3); ?>
            }]
        });
    });
</script>