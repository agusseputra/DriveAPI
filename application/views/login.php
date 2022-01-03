<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Repository Dokumen</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url();?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url();?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url();?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?=base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>

</head>

<body class="login-container">

	<!-- Main navbar -->
	
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form action="<?=site_url('login/login?err');?>" class="form-ajax form-validate-jquery" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
									<img width="100" src="<?=base_url('assets/images/logoundiksha.png')?>">
								<h5 class="content-group">Document Repository <small class="display-block">
									Sync Google Drive cloud storage
								</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" name="username" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn bg-pink-400 btn-block btn-ladda btn-ladda-spinner" data-spinner-color="#fff" data-style="slide-right"><span class="ladda-label"> Login <i class="icon-circle-right2 position-right"></i></span></button>
							</div>
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2019. <a href="http://undiksha.ac.id/">Document Repository</a> by <a href="http://undiksha.ac.id/" target="_blank">TIM IT FTK Undiksha</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
 <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/buttons/spin.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/buttons/ladda.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/validation/validate.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/custom/ajax.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/custom/validate.js') ?>"></script>
