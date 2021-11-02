 <footer class="footer full-color">
    <section id="bottom">
        <div class="section-inner">
            <div class="container">
                <div class="row normal-sidebar">
                    <div class="widget widget-text">
                        <div class="row">
                            <div class=" widget divider-widget">
                                <div class=" widget-inner">
                                    <div class="un-heading un-separator">
                                        <div class="un-heading-wrap">
                                            <span class="un-heading-line un-heading-before">
                                                <span></span>
                                            </span>
                                            <button class="flat-button style1"><?=$title ?>
                                            </button>
                                            <span class="un-heading-line un-heading-after">
                                                <span></span>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>

                            <div class=" col-md-5  widget widget-text">
                                <div class=" widget-inner">
                                    <h2 class="widget-title maincolor1"><img src="<?php echo base_url();?>uploads/web/<?=$logo ?>"></h2>
                                    <div class="textwidget">
                                        <p>Jl. Angkasa No.12 RT.006/RW.001 Kelurahan Air Hitam, Kecamatan Payung Sekaki – Kota Pekanbaru, Kodepos: 28292.</p>
                                        <p><?=$teks_kontak ?></p>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3  widget widget-nav-menu">
                                <div class=" widget-inner">
                                    <h2 class="widget-title maincolor1">Menu Utama</h2>
                                    <hr>
                                    <div class="menu-law-business-container">
                                        <ul id="menu-law-business" class="menu">
                                            
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1280">
                                                <?php if ($this->session->userdata('id')): ?>
                                                    <a href="<?php echo site_url('alumni');?>" target="_blank">Data Alumni</a>
                                                <?php else: ?>

                                                <?php endif; ?>
                                                <a href="<?php echo site_url('agenda');?>" target="_blank">Agenda</a>
                                                <a href="<?php echo site_url('berita');?>" target="_blank">Berita</a>
                                                <a href="<?php echo site_url('statistik');?>" target="_blank">Statistik</a>
                                                <a href="<?php echo site_url('galeri');?>" target="_blank">Galeri</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class=" col-md-4 widget widget-nav-menu">
                                <div class=" widget-inner">
                                    <h2 class="widget-title maincolor1">Contact Person</h2>
                                    <hr>
                                    <div class="menu-law-business-container">
                                        <ul id="menu-law-business" class="menu">
                                            <?php 
                                            $adm = $this->db->query("SELECT * from admin");
                                            foreach ($adm->result() as $a) {    
                                                ?>
                                                
                                                <p><u><?php echo $a->nama; ?></u>&nbsp;: <?php echo $a->telp; ?>
                                            </p>
                                            
                                        </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div id="bottom-nav">
                    <div class="container">

                        <div class="link-center">
                            <div class="line-under"></div>
                            <a class="flat-button go-top-v1 style1" href="#top">TOP</a>
                        </div>
                    </div><!--/row-->
                </div><!--/container-->
                
            </section>

            <div id="bottom-nav">
                <div class="container">
                    
                    <div class="row footer-content">
                        <div class="copyright col-md-12">
                         <center><?=$footer ?></center>
                     </div>
                 </div><!--/row-->
             </div><!--/container-->
         </div>
     </footer>

     <!-- Javascript -->
     <script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/bootstrap.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/jquery.easing.js"></script>
     
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/owl.carousel.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/parallax.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/jquery-waypoints.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/jquery.tweet.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/jquery.matchHeight-min.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/jquery-validate.js"></script> 

     <!-- Revolution Slider -->
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/jquery.themepunch.tools.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/jquery.themepunch.revolution.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/slider.js"></script>
     
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/jquery.isotope.min.js"></script> 
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/imagesloaded.min.js"></script>
     
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/jquery.cookie.js"></script> 
     <script type="text/javascript" src="<?php echo base_url();?>assets/web/javascript/main.js"></script>

     <script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

     <script type="text/javascript" src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
     <script type="text/javascript" src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
 </div>
</body>

<script type="text/javascript">
$('.datepicker').datetimepicker({
  language:  'id',
  weekStart: 1,
  todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  minView: 2,
  forceParse: 0
});
</script>

<script type="text/javascript">

var table;

$(document).ready(function() {

    table = $('#table').DataTable({ 

        "processing": true, 
        "serverSide": true, 
        "order": [], 
        "searching":false,

        "ajax": {
            "url": "<?php echo site_url('alumni/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
                data.nama = $('#nama').val();
                data.tahun = $('#tahun').val();
                data.asrama = $('#asrama').val();
            }
        },

        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, 
        },
        ],

    });

    $('#btn-submit').click(function(){ 
        table.ajax.reload(null,false);  
    });
    $('#btn-reset').click(function(){ 
        $('#form-filter')[0].reset();
        table.ajax.reload(null,false);  
    });

});

function edit_alumni(id)
{
    save_method = 'update';
    $('#form')[0].reset(); 
    $('.form-group').removeClass('has-error'); 
    $('.help-block').empty(); 

    $.ajax({
        url : "<?php echo site_url('alumni/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="username"]').val(data.username);
            $('[name="nama_lengkap"]').val(data.nama_lengkap);
            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
            $('[name="id_asrama"]').val(data.nama_asrama);
            $('[name="telp"]').val(data.telp);
            $('[name="tahun_lulus"]').val(data.tahun_lulus);
            $('[name="email"]').val(data.email);
            $('[name="profesi"]').val(data.profesi);
            $('[name="tempat_lahir"]').val(data.tempat_lahir);
            $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
            $('[name="agama"]').val(data.agama);
            $('[name="tempat_kerja"]').val(data.tempat_kerja);
            $('[name="id_kabupaten"]').val(data.nama_kabupaten);
            $('[name="id_provinsi"]').val(data.nama_provinsi);
            $('[name="alamat"]').val(data.alamat);
            $('#modal_form').modal('show'); 
            $('.modal-title').text('Detail Alumni'); 

            $('#photo-preview').show(); 

            if(data.foto)
            {
                $('#photo-preview div').html('<img src="'+'<?php echo base_url();?>'+'uploads/alumni/'+data.foto+'" class="img-thumbnail" style="max-height:200px">'); 

            }
            else
            {
                $('#photo-preview div').text('(No photo)');
            }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

</script>


<script type="text/javascript">
$('#notifikasi').slideDown('slow').delay(5000).slideUp('slow');
</script>
</html>