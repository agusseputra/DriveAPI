				<div class="page-header">
					<!-- Header content -->
					<div class="page-header-content">
						<div >
							<h4 class=""><i class="icon-arrow-left52 position-left"></i> Daftar Program Studi</h4>
                            <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                        </div>
						<div class="heading-elements">
                        <ul class="breadcrumb position-right">
								<li><a href="index.html">Home</a></li>
								<li class="active">Daftar Prodi</li>
							</ul>
						</div>
					</div>                   
					<!-- /toolbar -->
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- User profile -->
					<div class="row">
						<div class="col-lg-12">
						<div class="panel panel-flat">
								<div class="panel-heading">									
									<div class="row">
										<hr/ style="margin-bottom: 0px;">
									</div>
								</div>
								<div class="panel-body" style="display: block;">									
									<div class="row">
                                    <ul class="media-list content-group">
									<?php foreach($prodi as $val){?>
                                        <li class="media stack-media-on-mobile">
				                					<div class="media-left">
														<div class="thumb">
															<a href="#">
																<img src="<?=base_url()?>/assets/images/logoundiksha.png" >
															</a>
														</div>
													</div>

				                					<div class="media-body">
                                                        <h6 class="media-heading"><a href="<?=site_url($val['permalink'].'/standar/1');?>"><?=$val['nama_prodi'];?></a></h6>
                                                        <ul class="list-inline list-inline-separate text-muted mb-5">
							                    			<li><?=$val['permalink']?></li>
							                    			<li>Fakultas Teknik dan Kejuruan</li>
							                    		</ul>
							                    		</div>
												</li>
                                   <?php } ?>
                                    </ul>			
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user profile -->


					<!-- Footer -->
					<div class="footer text-muted">
						© 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
