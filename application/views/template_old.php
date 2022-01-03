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
			z-index: 999;
			top: 0;
			left: 0;
		}

		.lll img {
			top: 50%;
			left: 50%;
			position: absolute;
		}
	</style>

</head>

<body data-gr-c-s-loaded="true" class="pace-done">
	<div class="pace  pace-inactive">
		<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
			<div class="pace-progress-inner"></div>
		</div>
		<div class="pace-activity"></div>
	</div>

	<!-- Main navbar -->
	<div class="navbar navbar-default header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand text-white" href="<?=site_url();?>">Dokumen Akreditasi PS</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile" class="legitRipple"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle legitRipple"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs legitRipple"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container" style="min-height:703.5999984741211px">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user-material">
						<div class="category-content">
							<div class="sidebar-user-material-content">
								<a href="#" class="legitRipple"><img src="<?=base_url('assets/images/logoundiksha.png')?>" class="img-circle img-responsive" alt=""></a>
							</div>
						</div>
					</div>
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Utama</span> <i class="icon-menu" title="" data-original-title="Main pages"></i></li>
								<li class="home"><a href="<?=site_url();?>" class="legitRipple"><i class="icon-home4"></i> <span>Daftar Program Studi</span></a></li>
								<?php if(isset($standar) && $standar!=NULL){?>
									<li class="navigation-header">Standar</li>
									<?php foreach($standar as $val){?>
									<li class="<?=($this->uri->segment(3)==$val['id_kategori'])?'active':'';?> "><a href="<?=site_url($prodi['permalink'].'/standar/'.$val['id_kategori']);?>" class="legitRipple"><i class="icon-seven-segment-<?=$val['id_kategori']?>"></i> <span><?=$val['standar']?></span></a></li>
								<?php } }?> <!-- /page kits -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
				<?php $this->load->view($content); ?>
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->



</body>
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
<script>
	$('.<?= ($this->uri->segment(1)) ? $this->uri->segment(1) : 'home '; ?>').addClass('active');
	$('.breadcrumb').html($('.navigasi').html());
	$('#sub-title').html($('.sub-title').html());
</script>

</html>