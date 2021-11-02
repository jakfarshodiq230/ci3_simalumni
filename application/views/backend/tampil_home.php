<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Halaman Admin</title>

	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css" />

	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/dropzone.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-fonts.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

	<script type="text/javascript">
	window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery.js'>"+"<"+"/script>");
</script>

<script type="text/javascript">
if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
</script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>

<!-- ace settings handler -->
<script src="<?php echo base_url();?>assets/js/ace-extra.js"></script>

<!-- page specific plugin styles -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-timepicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.css" />

<!-- page specific plugin scripts -->
<script src="<?php echo base_url();?>assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>

<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

<script src="<?php echo base_url();?>assets/js/ace/elements.scroller.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/elements.colorpicker.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/elements.fileinput.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/elements.typeahead.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/elements.spinner.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/elements.treeview.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/elements.wizard.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/elements.aside.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.ajax-content.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.touch-drag.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.sidebar.js"></script>

<script src="<?php echo base_url();?>assets/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.submenu-hover.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.widget-box.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.settings.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.settings-rtl.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.settings-skin.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.widget-on-reload.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/ace.searchbox-autocomplete.js"></script>

</head>
<?php
$adm=$this->session->userdata('id');
$qu=$this->db->query("SELECT * from admin where id='$adm'")->row_array(); ?>

<body class="no-skin">
	<!-- #section:basics/navbar.layout -->
	<?php $this->load->view('backend/tampil_header');?>

	<!-- /section:basics/navbar.layout -->
	<div class="main-container" id="main-container">

		<div id="sidebar" class="sidebar responsive">

			<div class="space-4"></div>

			<div class="center">
				<img class="img-circle" src="<?php echo base_url('uploads/foto_user/'.$qu['foto']); ?>" width="120" height="120" />

				<div class="space-4"></div>

				<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
					<div class="inline position-relative">
						<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
							<i class="ace-icon fa fa-circle light-green"></i>
							&nbsp;
							<span class="white"><?php echo $qu['nama']; ?></span>
						</a>
					</div>
				</div>
			</div>

			<div class="space-4"></div>

			<!-- start: MAIN NAVIGATION MENU -->
			<?php $this->load->view('backend/tampil_menu');?>
			<!-- end: MAIN NAVIGATION MENU -->


			<!-- #section:basics/sidebar.layout.minimize -->
			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>

			<!-- /section:basics/sidebar.layout.minimize -->
			<script type="text/javascript">
			try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
		</script>
	</div>

	<!-- /section:basics/sidebar -->
	<div class="main-content">
		<div class="main-content-inner">
			<!-- #section:basics/content.breadcrumbs -->
			<div class="breadcrumbs" id="breadcrumbs">
				<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#"><?php echo $judul;?></a>
				</li>
				<li class="active"><?php echo $sub_judul;?></li>
			</ul><!-- /.breadcrumb -->
		</div>

		<!-- /section:basics/content.breadcrumbs -->
		<div class="page-content">

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					<?php $this->load->view($content);?>


				</div>
				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->

		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<div class="footer">
	<div class="footer-inner">
		<!-- #section:basics/footer -->
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder">Sistem Informasi</span>
				Pengolahan Data Alumni STKIP 'AISYIYAH RIAU &copy; 2020
			</span>
		</div>

		<!-- /section:basics/footer -->
	</div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!--[if !IE]> -->
<script type="text/javascript">
window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery.js'>"+"<"+"/script>");
</script>

<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.maskedinput.js"></script>
<script src="<?php echo base_url();?>assets/js/ace/elements.fileinput.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.easypiechart.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.sparkline.js"></script>
<script src="<?php echo base_url();?>assets/js/flot/jquery.flot.js"></script>
<script src="<?php echo base_url();?>assets/js/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url();?>assets/js/flot/jquery.flot.resize.js"></script>

<script>
tinymce.init({
	selector: "textarea",
	theme: "modern",
	plugins: [
	"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker toc",
	"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	"save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern codesample"
	],
	external_plugins: {
					//"moxiemanager": "/moxiemanager-php/plugin.js"
				},
				content_css: "css/development.css",
				add_unload_trigger: false,

				image_advtab: true,
				image_caption: true,

				style_formats: [
				{title: 'Bold text', format: 'h1'},
				{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'Example 1', inline: 'span', classes: 'example1'},
				{title: 'Example 2', inline: 'span', classes: 'example2'},
				{title: 'Table styles'},
				{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
				],

				template_replace_values : {
					username : "Jack Black"
				},

				template_preview_replace_values : {
					username : "Preview user name"
				},

				link_class_list: [
				{title: 'Example 1', value: 'example1'},
				{title: 'Example 2', value: 'example2'}
				],

				image_class_list: [
				{title: 'Example 1', value: 'example1'},
				{title: 'Example 2', value: 'example2'}
				],

				templates: [
				{title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'},
				{title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
				],

				setup: function(ed) {
					/*ed.on(
						'Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ' +
						'NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide' +
						'Change Undo Redo AddUndo BeforeAddUndo', function(e) {
						console.log(e.type, e);
					});*/
				},

				spellchecker_callback: function(method, data, success) {
					if (method == "spellcheck") {
						var words = data.match(this.getWordCharPattern());
						var suggestions = {};

						for (var i = 0; i < words.length; i++) {
							suggestions[words[i]] = ["First", "second"];
						}

						success({words: suggestions, dictionary: true});
					}

					if (method == "addToDictionary") {
						success();
					}
				}
			});

if (!window.console) {
	window.console = {
		log: function() {
			tinymce.$('<div></div>').text(tinymce.grep(arguments).join(' ')).appendTo(document.body);
		}
	};
}
</script>
</body>

</html>

<script type="text/javascript">
jQuery(function($) {
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	})
		//show datepicker when clicking on the icon
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});

	});
</script>

<script type="text/javascript">
$('#notifikasi').slideDown('slow').delay(5000).slideUp('slow');
</script>
