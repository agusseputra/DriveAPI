<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= (isset($title)) ? $title : 'APS'; ?></title>
	<meta name="description" content="Angket ini bertujuan mengumpulkan informasi tentang kepuasan dosen terhadap sistem dan praktik pengelolaan sumber daya manusia di
     Universitas Pendidikan Ganesha. Angket ini terdiri atas dua jenis, yaitu angket tertutup dan angket terbuka.">
	<meta name="author" content="upttik">
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
	<link href="<?= base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<style type="text/css">
		.table-xxs>thead>tr>th,
		.table-xxs>tbody>tr>th,
		.table-xxs>thead>tr>td,
		.table-xxs>tbody>tr>td {
			padding: 3px;
		}

		.lo {
			background-color: rgba(0, 0, 0, 0.2);
			height: 100%;
			width: 100%;
			position: fixed;
			z-index: 999;
			top: 0;
			left: 0;
		}

		.lo img {
			top: 50%;
			left: 50%;
			position: absolute;
		}

		.lll {
			background-color: rgba(0, 0, 0, 0.2);
			height: 100%;
			width: 100%;
			position: fixed;
			z-index: 1100 !important;
			top: 0;
			left: 0;
		}

		.lll img {
			top: 50%;
			left: 50%;
			position: absolute;
		}
		.tree{
			list-style-type: none;
		}
		.tree > li > a {
			padding: 10px;
		}
		.tree .active {
			background-color: #304047;
		}
		.wysihtml5-toolbar .btn{padding: 5px}
	</style>
</head>
<?php
function tampilkanMenuBertingkat ($menu,$in,$permalink) {
	if(isset($menu[$in]) && $menu[$in] != NULL){
	echo "<ul class='tree '>";
	foreach ($menu[$in] as $key => $item) {?>
		<li class="<?=$item['permalink'];?> mf"> <a  style="cursor: pointer" onclick="load_url('#cont', '<?=site_url('dokumen/folder/'.$permalink.'/'. $item['permalink'])?>','<?=$item['permalink'];?>')">
			- <?= $item['nama_folder']; ?> <?=(@$menu[$item['id_folder']] && count($menu[$item['id_folder']]))?" <i class=' icon-arrow-down22 pull-right'></i>":"";?></a>
		</li>
	  <?php if (@$menu[$item['id_folder']] && count($menu[$item['id_folder']])) {
		tampilkanMenuBertingkat($menu,$item['id_folder'],$permalink);
	  }
	}
	echo "</ul>";
	}
  }
?>
<body data-gr-c-s-loaded="true" class="pace-done">
	<div class="pace  pace-inactive">
		<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
			<div class="pace-progress-inner"></div>
		</div>
		<div class="pace-activity"></div>
	</div>
	<div class="navbar navbar-default navbar-fixed-top header-highlight" style="background: rgb(15,159,212);
background: linear-gradient(146deg, rgba(15,159,212,1) 0%, rgba(164,219,239,1) 100%, rgba(255,255,255,1) 100%);">
		<div class="navbar-header" style="background: rgb(15,159,212);">
			<a class="navbar-brand text-white" href="<?=site_url()?>" style="padding-top: 5px;"><img  style="width: 100%; height: auto;" src="<?=base_url('assets/images/logo.png');?>"></a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile" class="legitRipple"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle legitRipple"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs legitRipple"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<div class="navbar-left">
			<p class="navbar-text text-white" style="font-weight: bold">Dokumen Usulan PS Teknologi Rekayasa Perangkat Lunak</p>
			</div>
		</div>
	</div>
	<!-- Main navbar -->
	<div class="navbar navbar-default header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand text-white" href="<?=site_url();?>">Document Repository</a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile" class="legitRipple"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle legitRipple"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>
		
	</div>
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container" style="min-height:703.5999984741211px">
	<div class="page-content">
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding" style="overflow: auto;">
							<ul class="navigation navigation-main navigation-accordion">
								<li class="navigation-header"><span>Menu</span> <i class="icon-menu" title="" data-original-title="Main pages"></i></li>
								<li class="folder"><a href="<?=site_url($permalink.'/dokumen/folder?f');?>" class="legitRipple"><i class="icon-folder"></i> <span>Dokumen</span></a></li>
								<?php if(isset($folder)) tampilkanMenuBertingkat($folder,0,$permalink) ?>
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->
			<!-- Main content -->
			<div class="content-wrapper" >
				<div class="content" id="cont">
					<?php $this->load->view($content); ?>
				</div>
				<div class="footer text-muted" >
					<div align="center" style="margin-left: 20px;">
						© 2021. Manajemen Informatika. Media File in Google Drive Cloud Storage d3informatika@undiksha.ac.id. Root Folder: media/
					</div>
				</div>
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
</body>
<div class="ll hide">
    <div class='lll'><img  src="<?=base_url('assets/images/facebook.gif')?>"></div>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/core/app.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/buttons/spin.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/buttons/ladda.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/validation/validate.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom/ajax.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom/validate.js') ?>"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
<script src="<?= base_url('assets/js/plugins/tables/datatables/extensions/fixed_header.min.js') ?>"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/editors/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/editors/wysihtml5/toolbar.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/editors/wysihtml5/parsers.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/editors/wysihtml5/locales/bootstrap-wysihtml5.ua-UA.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/plugins/media/fancybox.min.js"></script>
<!--<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/ckeditor/ckeditor.js"></script>-->
<script>
	$('.<?= ($this->uri->segment(2)) ? $this->uri->segment(2) : 'home '; ?>').addClass('active');
	$('.breadcrumb').html($('.navigasi').html());
	$('#sub-title').html($('.sub-title').html());
	$('.mf').removeClass('active');
    $('.'+'<?=(isset($_GET['f']))?$_GET['f']:'';?>').addClass('active');
</script>
</html>