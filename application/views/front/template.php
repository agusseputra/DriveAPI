<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= (isset($title)) ? $title : 'BRIVA Undiksha'; ?></title>
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
			z-index: 999;
			top: 0;
			left: 0;
		}

		.lll img {
			top: 50%;
			left: 50%;
			position: absolute;
		}
		.navigation li a {
   			color: black;
			   }
			   .navigation li a:hover {
   			color: black;
			   }
			   .navigation .navigation-header, .navigation .navigation-header a {
    color: black;
			   }
		.panel-heading {
    		 padding: 10px 10px 0px 10px;
		}
	</style>
</head>
<body class="navbar-top">
	<div class="pace  pace-inactive">
		<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
			<div class="pace-progress-inner"></div>
		</div>
		<div class="pace-activity"></div>
	</div>
	<div class="navbar navbar-default navbar-fixed-top header-highlight" style="background: rgb(15,159,212);
background: linear-gradient(146deg, rgba(15,159,212,1) 0%, rgba(164,219,239,1) 100%, rgba(255,255,255,1) 100%);">
		<div class="navbar-header" style="background: rgb(15,159,212);">
			<a class="navbar-brand text-white" href="index.html" style="padding-top: 5px;"><img  style="width: 100%; height: auto;" src="<?=base_url('assets/images/logo.png');?>"></a>
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
			<p class="navbar-text text-white" style="font-weight: bold">APLIKASI PENDATAAN PENERIMA BANTUAN IURAN</p>
			</div>
		</div>
	</div>
	<div class="page-container" style="min-height:703.5999984741211px">
		<div class="page-content">
			<div class="sidebar sidebar-main sidebar-fixed" style="background-color: #ffffff;color:black;">
				<div class="sidebar-content">
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<li class="navigation-header"><span>Utama</span> <i class="icon-menu" title="" data-original-title="Main pages"></i></li>
								<li class="home"><a href="<?=site_url();?>" class="legitRipple"><i class="icon-home4"></i> <span>Beranda</span></a></li>
								<li class="rekap rekap_kec"><a href="<?=site_url('rekap');?>" class="legitRipple"><i class="icon-stats-bars"></i> <span>Rekap PBI</span></a></li>
								<li class="tampil tampilkec"><a href="<?=site_url('tampil');?>" class="legitRipple"><i class="icon-menu2"></i> <span>PBI APBN</span></a></li>
								<?php if($this->session->userdata('email')){?>
									<li class="data"><a href="<?=site_url('data');?>" class="legitRipple"><i class="icon-menu2"></i> <span>Data</span></a></li>
									<li class="ganda"><a href="<?=site_url('ganda');?>" class="legitRipple"><i class="icon-menu2"></i> <span>Data Ganda</span></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="content-wrapper">
				<div class="content">
				<?php $this->load->view($content); ?>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/core/app.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.0/js/dataTables.fixedColumns.min.js"></script>
<script>
	$('.<?= ($this->uri->segment(1)) ? $this->uri->segment(1) : 'home '; ?>').addClass('active');
	$('.breadcrumb').html($('.navigasi').html());
	$('#sub-title').html($('.sub-title').html());
</script>
</html>